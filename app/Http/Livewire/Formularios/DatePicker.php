<?php

namespace App\Http\Livewire\Formularios;

use Livewire\Component;

class DatePicker extends Component
{

    public $fecha;

    public function render()
    {
        return view('livewire.formularios.date-picker');
    }
}
