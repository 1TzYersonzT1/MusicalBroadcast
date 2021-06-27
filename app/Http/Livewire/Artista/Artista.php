<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;

class Artista extends Component
{

    /**
     * Utilizado para bindear el artista desde un
     * componente padre
     */
    public $artista;

    public function render()
    {
        return view('livewire.artista.artista');
    }
}
