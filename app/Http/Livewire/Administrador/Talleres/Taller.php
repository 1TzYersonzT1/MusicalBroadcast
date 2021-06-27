<?php

namespace App\Http\Livewire\Administrador\Talleres;

use Livewire\Component;

class Taller extends Component
{

    public $solicitud, $slideActual;

    /**
     * Se emite una function definida en TallerPreview y le envia
     * el id de la solicitud actual mas el indice para controlar
     * el slider y la visualizacion.
     */
    public function mostrarSolicitud()
    {
        $this->emit('visualizarSolicitud', array('id' => $this->solicitud->id, 'slideActual' => $this->slideActual));
    }

    public function render()
    {
        return view('livewire.administrador.talleres.taller');
    }
}
