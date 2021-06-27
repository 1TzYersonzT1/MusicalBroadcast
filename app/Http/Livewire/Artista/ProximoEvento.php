<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;

class ProximoEvento extends Component
{

    /**
     * Utilizado para bindear la informacion del artista actual
     * desde el componente padre ArtistaPreview
     */
    public $artistaActual;

    public function render()
    {
        return view('livewire.artista.proximo-evento');
    }
}
