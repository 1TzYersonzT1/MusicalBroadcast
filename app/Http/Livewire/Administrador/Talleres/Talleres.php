<?php

namespace App\Http\Livewire\Administrador\Talleres;

use Livewire\Component;
use App\Models\SolicitudTaller;

class Talleres extends Component
{

    public $solicitudes = [];

    public function mount() {
        $this->solicitudes = SolicitudTaller::where('estado', '!=', 3)->get();
    }

    public function render()
    {
        return view('livewire.administrador.talleres.talleres');
    }
}
