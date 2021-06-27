<?php

namespace App\Http\Livewire\Organizador\Talleres\Crear\Requisito;

use Livewire\Component;

class Requisito extends Component
{

    /**
     * Es utilizado para bindear cada uno
     * de los requisitos de manera individual
     */
    public $requisito;

    /**
     * Se emite una function hacia el componente padre
     * Protoclos cada vez que el usuario
     * ha eliminado un requisito pasando como parametro
     * el requisito que se desea eliminar
     */
    public function eliminarRequisito() {
        $this->emit("eliminarRequisito", array("requisito" => $this->requisito));
    }

    public function render()
    {
        return view('livewire.organizador.talleres.crear.requisito.requisito');
    }
}
