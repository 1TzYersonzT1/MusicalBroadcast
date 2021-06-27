<?php

namespace App\Http\Livewire\Administrador\Eventos;

use Livewire\Component;

class Evento extends Component
{

    public $solicitud, $slideActual;

    /**
     * Emite una function que esta contenida en EventoPreview
     * y le envia al id de la solicitud actual mas el indice para
     * controlar el slider.
     */
    public function mostrarEvento()
    {
        $this->emit("mostrarEvento", array("id" => $this->solicitud->id, "actual" => $this->slideActual));
    }

    public function render()
    {
        return view('livewire.administrador.eventos.evento');
    }
}
