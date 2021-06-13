<?php

namespace App\Http\Livewire\Administrador\Solicitudes;

use Livewire\Component;

class Solicitud extends Component
{

    public $solicitud, $slideActual;

    public function mostrarSolicitud() {
        $this->emit('visualizarSolicitud', array('id' => $this->solicitud->id, 'slideActual' => $this->slideActual));
    }

    public function render()
    {
        return view('livewire.administrador.solicitudes.solicitud');
    }
}
