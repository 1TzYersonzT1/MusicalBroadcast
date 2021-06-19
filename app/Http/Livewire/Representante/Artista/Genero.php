<?php

namespace App\Http\Livewire\Representante\Artista;

use Livewire\Component;

class Genero extends Component
{

    public $genero;

    public function generoSeleccionado() {
        $this->emitTo("representante.artista.crear.crear-artista", 'updatedEstilos', array("seleccionado" => $this->genero->id));
    }
    
    public function render()
    {
        return view('livewire.representante.artista.genero');
    }
}
