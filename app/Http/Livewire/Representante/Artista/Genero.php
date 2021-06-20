<?php

namespace App\Http\Livewire\Representante\Artista;

use Livewire\Component;


class Genero extends Component
{

    public $genero, $estilos;

    public function generoSeleccionado() { 
        $this->estilos = [];
        $this->estilos = \App\Models\Genero::find($this->genero->id)->estilos;
        $this->emitTo("representante.artista.crear.crear-artista", 'updatedEstilo', $this->estilos);
    }
    
    public function render()
    {
        return view('livewire.representante.artista.genero');
    }
}
