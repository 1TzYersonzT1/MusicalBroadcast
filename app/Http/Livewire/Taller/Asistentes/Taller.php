<?php

namespace App\Http\Livewire\Taller\Asistentes;

use Livewire\Component;
use App\Models\Taller as ModelsTaller;

class Taller extends Component
{

    public $taller;

    protected $listeners = ["eliminarAsistente"];

    public function eliminarAsistente(array $seleccionado) {
        $this->dispatchBrowserEvent("prueba", array("test"=>$seleccionado));
    }

    public function render()
    {
        return view('livewire.taller.asistentes.taller');
    }
}
