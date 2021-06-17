<?php

namespace App\Http\Livewire\Estilo;

use Livewire\Component;
use App\Models\Estilo;

class Estilos extends Component
{

    public $estilos, $seleccionados = [];

    public function mount() {
        $this->estilos = Estilo::all();
    }

    public function updated() {
        foreach($this->seleccionados as $index => $seleccionado) {
            if($this->seleccionados[$index] == false) {
                unset($this->seleccionados[$index]);
            }
        }
    }

    public function updatedSeleccionados() {
        $this->emitTo("artista.artistas", "updatedEstilos", array("seleccionados" => $this->seleccionados));
    }


    public function render()
    {
       return view('livewire.estilo.estilos');
    }
}
