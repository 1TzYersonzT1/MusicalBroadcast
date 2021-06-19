<?php

namespace App\Http\Livewire\Organizador\Talleres;

use Livewire\Component;

class Taller extends Component
{

    public $taller;

    public function mostrar() {
        $this->emitTo("organizador.solicitudes.solicitud-preview", "mostrarTaller", array("id" => $this->taller->id));
    }

    public function render()
    {
        return view('livewire.organizador.talleres.taller');
    }
}
