<?php

namespace App\Http\Livewire\Organizador;

use Livewire\Component;

class SolicitudPreview extends Component
{

    public $solicitudActual;
    public $titulo, $descripcion;

    public function mount() {
        $this->titulo = $this->solicitudActual->TAL_Nombre;
        $this->descripcion = $this->solicitudActual->TAL_Descripcion;
    }

    public function render()
    {
        return view('livewire.organizador.solicitud-preview');
    }
}
