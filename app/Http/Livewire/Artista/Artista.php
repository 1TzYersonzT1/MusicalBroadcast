<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;

class Artista extends Component
{

    public $artista;

    public function render()
    {
        return view('livewire.artista.artista');
    }
}
