<?php

namespace App\Http\Livewire\Organizador\Eventos;

use Livewire\Component;

class Evento extends Component
{

    public $evento;

    public function render()
    {
        return view('livewire.organizador.eventos.evento');
    }
}
