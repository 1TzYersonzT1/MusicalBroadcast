<?php

namespace App\Http\Livewire\Taller\Crear\Requisito;

use Livewire\Component;

class Requisito extends Component
{

    public $requisito;

    public function eliminarRequisito() {
        $this->emit("eliminarRequisito", array("requisito" => $this->requisito));
    }

    public function render()
    {
        return view('livewire.taller.crear.requisito.requisito');
    }
}
