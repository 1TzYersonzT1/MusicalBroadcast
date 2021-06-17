<?php

namespace App\Http\Livewire\Genero;

use Livewire\Component;
use App\Models\Genero;
use App\Models\Estilo;

class Generos extends Component
{
    public $generos, $seleccionados = [];

    public function mount()
    {
        $this->generos = Genero::all();
    }

    public function updated() 
    {
        foreach($this->seleccionados as $index => $seleccionado) {
            if($this->seleccionados[$index] == false) {
                unset($this->seleccionados[$index]);
            }
        }
    }

    public function updatedSeleccionados() 
    {
        $estilos = Estilo::select("EST_Nombre")->whereIn("genero_id", $this->seleccionados)->get();
        $this->emitTo('artista.artistas', 'updatedEstilos', array('seleccionados' => $estilos));
    }

    public function render()
    {
        return view('livewire.genero.generos');
    }
}
