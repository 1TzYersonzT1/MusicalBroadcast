<?php

namespace App\Http\Livewire\Genero;

use Livewire\Component;

class Genero extends Component
{

    public $genero, $generoArtista;

    public function updatedGeneroArtista() {
        $this->emitTo('artista.artistas', 'updatedGenero', array('generoArtista' => $this->generoArtista));
    }

    public function render()
    {
        return view('livewire.genero.genero');
    }
}
