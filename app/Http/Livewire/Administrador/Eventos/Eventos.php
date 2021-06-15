<?php

namespace App\Http\Livewire\Administrador\Eventos;

use Livewire\Component;
use App\Models\SolicitudEvento;

class Eventos extends Component
{

    public $eventos;

    public function mount() {
        $this->eventos = SolicitudEvento::where("estado", "!=", 3)->get(); 
    }

    public function render()
    {
        return view('livewire.administrador.eventos.eventos');
    }
}
