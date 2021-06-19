<?php

namespace App\Http\Livewire\Organizador\Talleres\Crear\Requisito;

use Livewire\Component;

class Requisitos extends Component
{

    public $requisitos = [];
    public $nuevoRequisito;

    protected $listeners = ["eliminarRequisito"];

    public function nuevoItem()
    {
        if ($this->nuevoRequisito != '') {
            $this->requisitos[] = $this->nuevoRequisito;
            $this->emit("updatedRequisitos", array("requisitos" => $this->requisitos));
            $this->nuevoRequisito = '';
        }
    }

    public function eliminarRequisito(array $seleccionado) {
        $key = array_search($seleccionado["requisito"], $this->requisitos);
        unset($this->requisitos[$key]);
        $this->emit("updatedRequisitos", array("requisitos" => $this->requisitos));
    }

    public function render()
    {
        return view('livewire.organizador.talleres.crear.requisito.requisitos');
    }
}
