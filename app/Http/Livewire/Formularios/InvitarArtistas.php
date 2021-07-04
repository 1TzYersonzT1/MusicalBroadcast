<?php

namespace App\Http\Livewire\Formularios;

use App\Models\Artista;
use Livewire\Component;

class InvitarArtistas extends Component
{

    public $nombreArtista, $resultados, $artistasSeleccionados = [];

    public function mount()
    {
        $this->resultados = [];
    }

    /**
     * 
     */
    public function updated()
    {
        foreach ($this->artistasSeleccionados as $index => $artistaSeleccionado) {
            if ($this->artistasSeleccionados[$index] == false) {
                unset($this->artistasSeleccionados[$index]);
            }
        }
    }

    /**
     * 
     */
    public function updatedNombreArtista()
    {
        if ($this->nombreArtista != '') {
            $this->resultados = Artista::where("user_rut", auth()->user()->rut)
                ->where('ART_Nombre', 'like', $this->nombreArtista . '%')->get();
        }
        $this->artistasSeleccionados = [];
    }

    /**
     * 
     */
    public function updatedArtistasSeleccionados()
    {
        $this->emitTo('evento.evento-preview', 'updatedArtistasSeleccionados', $this->artistasSeleccionados);
    }

    public function render()
    {
        return view('livewire.formularios.invitar-artistas');
    }
}
