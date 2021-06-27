<?php

namespace App\Http\Livewire\Organizador\Talleres\Crear\Protocolo;

use Livewire\Component;

class Protocolo extends Component
{

    /**
     * Utilizado para bindear la informacion
     * de cada protocolo de manera individual desde
     * su componente padre
     */
    public $protocolo;

    /**
     * Se emite una function hacia el componente padre
     * Protocolos cada vez que se elimina un protocolo
     * el cual es enviado como parametro a la function
     * mencionada.
     */
    public function eliminarProtocolo()
    {
        $this->emit("eliminarProtocolo", array("protocolo" => $this->protocolo));
    }

    public function render()
    {
        return view('livewire.organizador.talleres.crear.protocolo.protocolo');
    }
}
