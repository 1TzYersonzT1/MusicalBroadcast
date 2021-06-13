<?php

namespace App\Http\Livewire\Taller\Asistentes;

use App\Models\Asistente as ModelsAsistente;
use App\Models\Taller;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Asistente extends Component
{

    public $asistente;

    protected $listeners = ["eliminarAsistente"];

    public function eliminarAsistente()
    {
        $this->emit("confirmarEliminarAsistente", array("rut" => $this->asistente->rut));
    }

    public function render()
    {
        return view('livewire.taller.asistentes.asistente');
    }
}
