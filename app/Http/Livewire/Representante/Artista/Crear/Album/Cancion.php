<?php

namespace App\Http\Livewire\Representante\Artista\Crear\Album;

use Livewire\Component;

class Cancion extends Component
{
    /**
     * Es utilizado para bindear la informacion
     * de cada cancion que pertenece a un album
     * en particular
     */
    public $cancion;

    public function render()
    {
        return view('livewire.representante.artista.crear.album.cancion');
    }
}
