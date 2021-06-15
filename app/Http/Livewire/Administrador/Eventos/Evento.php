<?php

namespace App\Http\Livewire\Administrador\Eventos;

use Livewire\Component;

class Evento extends Component
{

    public $solicitud, $slideActual;

    public function mostrarEvento() {
        $this->emit("mostrarEvento", array("id" => $this->solicitud->id, "actual" => $this->slideActual));
    }

    public function render()
    {
        return view('livewire.administrador.eventos.evento');
    }
}
