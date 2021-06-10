<?php

namespace App\Http\Livewire\Organizador\Solicitudes;

use Livewire\Component;
use App\Models\SolicitudTaller;

class SolicitudPreview extends Component
{

    public $solicitudActual;


    
    public function render()
    {
        return view('livewire.organizador.solicitudes.solicitud-preview');
    }
}
