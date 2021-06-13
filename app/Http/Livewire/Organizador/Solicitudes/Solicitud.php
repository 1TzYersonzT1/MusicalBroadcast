<?php

namespace App\Http\Livewire\Organizador\Solicitudes;

use Livewire\Component;

class Solicitud extends Component
{

    public $taller;

    public function mostrar() {
        $this->emitTo("organizador.solicitudes.solicitud-preview", "mostrarTaller", array("id" => $this->taller->id));
    }

    public function render()
    {
        return view('livewire.organizador.solicitudes.solicitud');
    }
}
