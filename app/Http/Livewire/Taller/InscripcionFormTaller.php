<?php

namespace App\Http\Livewire\Taller;

use Livewire\Component;

class InscripcionFormTaller extends Component
{

    public $tallerSeleccionado;

    public function render()
    {
        return view('livewire.taller.inscripcion-form-taller');
    }
}
