<?php

namespace App\Http\Livewire\Evento;

use Livewire\Component;

class Evento extends Component
{

    public $evento, $slideActual;

    public function mostrarEvento() {
        $this->emit("visualizar-evento", array("id" => $this->evento->id, "slideActual" => $this->slideActual));
    }

    public function render()
    {
        return view('livewire.evento.evento');
    }
}
