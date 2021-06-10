<?php

namespace App\Http\Livewire\Organizador\Solicitudes;

use Livewire\Component;

class ModificarSolicitud extends Component
{

    public $solicitudSeleccionada;

    public function render()
    {
        return view('livewire.organizador.solicitudes.modificar-solicitud');
    }
}
