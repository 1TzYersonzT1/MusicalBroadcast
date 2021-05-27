<?php

namespace App\Http\Livewire\Taller\Crear;

use Livewire\Component;

class Requisitos extends Component
{

    public $requisitos;
    public $nuevoRequisito;

    public function nuevoItem()
    {
        if ($this->nuevoRequisito != '') {
            $this->requisitos[] = $this->nuevoRequisito;
            $this->emit('updatedRequisitos', array("requisitos" => $this->requisitos));
            $this->nuevoRequisito = '';
        }
    }

    public function render()
    {
        return view('livewire.taller.crear.requisitos');
    }
}
