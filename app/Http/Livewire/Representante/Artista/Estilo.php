<?php

namespace App\Http\Livewire\Representante\Artista;

use Livewire\Component;

class Estilo extends Component
{

    public $estilo, $seleccionados = [];

    public function render()
    {
        return view('livewire.representante.artista.estilo');
    }
}
