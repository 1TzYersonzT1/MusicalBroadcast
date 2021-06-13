<?php

namespace App\Http\Livewire\Taller\Asistentes;

use Livewire\Component;
use App\Models\Taller as ModelsTaller;

class Taller extends Component
{

    public $taller;

    protected $listeners = ["confirmarEliminarAsistente"];

    public function confirmarEliminarAsistente(array $asistente) {
        $taller = ModelsTaller::find($this->taller->id);
        $taller->TAL_Aforo = $taller->TAL_Aforo + 1;
        $taller->save();
        $taller->asistentes()->detach($asistente["rut"]);
    }

    public function render()
    {
        return view('livewire.taller.asistentes.taller');
    }
}
