<?php

namespace App\Http\Livewire\Organizador\Eventos;

use Livewire\Component;

class Evento extends Component
{

    /**
     * Es utilizado para bindear la informacion
     * de cada evento desde el componnente padre MisEVentos
     */
    public $evento;

    public function render()
    {
        return view('livewire.organizador.eventos.evento');
    }
}
