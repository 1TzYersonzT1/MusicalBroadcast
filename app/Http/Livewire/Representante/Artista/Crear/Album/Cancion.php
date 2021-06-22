<?php

namespace App\Http\Livewire\Representante\Artista\Crear\Album;

use Livewire\Component;

class Cancion extends Component
{
    public $cancion;

    public function render()
    {
        return view('livewire.representante.artista.crear.album.cancion');
    }
}
