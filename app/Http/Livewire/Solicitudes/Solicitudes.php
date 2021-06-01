<?php

namespace App\Http\Livewire\Solicitudes;

use Livewire\Component;
use App\Models\SolicitudTaller;

class Solicitudes extends Component
{

    public $solicitudes = [];
    public $mensaje;

    public function mount() {
        $this->solicitudes = SolicitudTaller::where('estado', '!=', 3)->get();
    }

    public function render()
    {
        return view('livewire.solicitudes.solicitudes');
    }
}
