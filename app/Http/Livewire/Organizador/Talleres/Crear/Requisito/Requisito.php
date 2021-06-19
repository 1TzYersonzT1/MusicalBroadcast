<?php

namespace App\Http\Livewire\Organizador\Talleres\Crear\Requisito;

use Livewire\Component;

class Requisito extends Component
{

    public $requisito;

    public function eliminarRequisito() {
        $this->emit("eliminarRequisito", array("requisito" => $this->requisito));
    }

    public function render()
    {
        return view('livewire.organizador.talleres.crear.requisito.requisito');
    }
}
