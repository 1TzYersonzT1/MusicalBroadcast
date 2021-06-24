<?php

namespace App\Http\Livewire\Representante\Artista\Crear\Elecciones;

use Livewire\Component;

class Estilo extends Component
{

    public $estilo, $seleccionados = [];

    public function render()
    {
        return view('livewire.representante.artista.crear.elecciones.estilo');
    }
}
