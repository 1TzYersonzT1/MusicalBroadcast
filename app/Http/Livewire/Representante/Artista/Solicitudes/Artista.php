<?php

namespace App\Http\Livewire\Representante\Artista\Solicitudes;

use Livewire\Component;

class Artista extends Component
{

    public $artista;

    public function render()
    {
        return view('livewire.representante.artista.solicitudes.artista');
    }
}
