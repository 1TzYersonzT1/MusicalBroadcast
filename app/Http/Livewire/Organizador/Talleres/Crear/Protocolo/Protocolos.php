<?php

namespace App\Http\Livewire\Organizador\Talleres\Crear\Protocolo;

use Livewire\Component;

class Protocolos extends Component
{

    public $protocolos = [];
    public $nuevoProtocolo;

    protected $listeners = ["eliminarProtocolo"];

    public function nuevoItem()
    {
        if ($this->nuevoProtocolo != '') {
            $this->protocolos[] = $this->nuevoProtocolo;
            $this->emit("updatedProtocolos", array("protocolos" => $this->protocolos));
            $this->nuevoProtocolo = '';
        }
    }

    public function eliminarProtocolo(array $seleccionado) {
        $key = array_search($seleccionado["protocolo"], $this->protocolos);
        unset($this->protocolos[$key]);
        $this->emit("updatedProtocolos", array("protocolos" => $this->protocolos));
    }

    public function render()
    {
        return view('livewire.organizador.talleres.crear.protocolo.protocolos');
    }
}
