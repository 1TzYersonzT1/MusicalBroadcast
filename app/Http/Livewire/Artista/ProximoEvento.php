<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;

class ProximoEvento extends Component
{
    public $artistaActual;

    public function render()
    {
        return view('livewire.artista.proximo-evento');
    }
}
