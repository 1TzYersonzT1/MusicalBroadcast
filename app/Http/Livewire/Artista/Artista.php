<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;

class Artista extends Component
{

    public $artista;

    public function mostrarArtista()
    {
        $this->emit('visualizar-ART', array('id' => $this->artista->id));
    }


    public function render()
    {
        return view('livewire.artista.artista');
    }
}
