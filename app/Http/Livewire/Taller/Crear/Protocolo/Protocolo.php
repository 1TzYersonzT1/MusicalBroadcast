<?php

namespace App\Http\Livewire\Taller\Crear\Protocolo;

use Livewire\Component;

class Protocolo extends Component
{

    public $protocolo;

    public function eliminarProtocolo() {
        $this->emit("eliminarProtocolo", array("protocolo" => $this->protocolo));
    }

    public function render()
    {
        return view('livewire.taller.crear.protocolo.protocolo');
    }
}
