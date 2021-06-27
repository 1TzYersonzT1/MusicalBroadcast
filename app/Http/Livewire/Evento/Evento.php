<?php

namespace App\Http\Livewire\Evento;

use Livewire\Component;

class Evento extends Component
{

    public $evento, $slideActual;

    /**
     * Se emite un evento al componente padre para controlar
     * la visualizacion del evento actual y el slider
     */
    public function mostrarEvento()
    {
        $this->emit("visualizar-evento", array("id" => $this->evento->id, "slideActual" => $this->slideActual));
    }

    public function render()
    {
        return view('livewire.evento.evento');
    }
}
