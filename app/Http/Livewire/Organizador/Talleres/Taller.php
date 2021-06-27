<?php

namespace App\Http\Livewire\Organizador\Talleres;

use Livewire\Component;

class Taller extends Component
{
    /**
     * Es utilizado para bindear la informacion
     * de cada taller que se encuentre con 
     * una solicitud
     */
    public $taller;

    /**
     * Emite una function al componente padre para previsualizar
     * el taller seleccionado
     */
    public function mostrar()
    {
        $this->emitTo("organizador.solicitudes.solicitud-preview", "mostrarTaller", array("id" => $this->taller->id));
    }

    public function render()
    {
        return view('livewire.organizador.talleres.taller');
    }
}
