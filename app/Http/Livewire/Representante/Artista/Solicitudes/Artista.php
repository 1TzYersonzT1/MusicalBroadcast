<?php

namespace App\Http\Livewire\Representante\Artista\Solicitudes;

use Livewire\Component;

class Artista extends Component
{

    /**
     * Utilizado para bindear la informacion
     * de cada artista
     */
    public $artista;

    public function render()
    {
        return view('livewire.representante.artista.solicitudes.artista');
    }
}
