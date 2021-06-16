<?php

namespace App\Http\Livewire\Taller\Asistentes;

use Livewire\Component;
use App\Models\Taller as ModelsTaller;
use App\Mail\PosponerTaller;
use Illuminate\Support\Facades\Mail;

class Taller extends Component
{

    public $taller;

    protected $listeners = ["eliminarAsistente"];

    public function eliminarAsistente(array $seleccionado) {
        $this->dispatchBrowserEvent("prueba", array("test"=>$seleccionado));
    }

    public function prueba() {
     

        foreach($this->taller->asistentes as $asistente) {

            $mensaje = [
                "taller" => $this->taller,
                "asistente" => $asistente,
            ];

            Mail::to($asistente->email)->send(new PosponerTaller($mensaje));
        }

      
    }

    public function render()
    {
        return view('livewire.taller.asistentes.taller');
    }
}
