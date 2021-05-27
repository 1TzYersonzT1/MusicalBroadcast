<?php

namespace App\Http\Livewire\Taller\Crear;

use Livewire\Component;

class Protocolos extends Component
{

    public $protocolos;
    public $nuevoProtocolo;

    public function nuevoItem()
    {
        if ($this->nuevoProtocolo != '') {
            $this->protocolos[] = $this->nuevoProtocolo;
            $this->emit("updatedProtocolos", array("protocolos" => $this->protocolos));
            $this->nuevoProtocolo = '';
        }
    }

    public function render()
    {
        return view('livewire.taller.crear.protocolos');
    }
}
