<?php

namespace App\Http\Livewire\Administrador\Talleres;

use Livewire\Component;

class Taller extends Component
{

    public $solicitud, $slideActual;

    public function mostrarSolicitud() {
        $this->emit('visualizarSolicitud', array('id' => $this->solicitud->id, 'slideActual' => $this->slideActual));
    }

    public function render()
    {
        return view('livewire.administrador.talleres.taller');
    }
}
