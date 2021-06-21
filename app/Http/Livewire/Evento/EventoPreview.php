<?php

namespace App\Http\Livewire\Evento;

use Livewire\Component;
use App\Models\Evento;

class EventoPreview extends Component
{

    public $eventoActual, $artistasSeleccionados = [];

    protected $listeners = [
        "visualizar-evento" => 'visualizar',
        'aprobarEvento',
        'validarPeticiones',
        'envioPeticionesConfirmado'
    ];

    protected $messages = [
        'artistasSeleccionados.required' => 'Debe seleccionar al menos 1 artista antes de enviar una petición.'
    ];

    public function visualizar(array $eventoSeleccionado) {
        $this->eventoActual = Evento::find($eventoSeleccionado["id"]);
        $this->dispatchBrowserEvent("mostrarEvento", array("slideActual" => $eventoSeleccionado["slideActual"]));
    }

    public function validarPeticiones() {
        $this->validate([
            'artistasSeleccionados' => 'required|array|min:1',
        ]);
        $this->dispatchBrowserEvent('confirmarEnvioPeticiones');
    }

    public function envioPeticionesConfirmado() {
        $this->eventoActual->artistas()->syncWithoutDetaching($this->artistasSeleccionados);
    }

    public function updatedArtistasSeleccionados() {
        foreach($this->artistasSeleccionados as $index => $artistaSeleccionado) {
            if($this->artistasSeleccionados[$index] == false) {
                unset($this->artistasSeleccionados[$index]);
            }
        }
    }

    public function render()
    {
        return view('livewire.evento.evento-preview');
    }
}
