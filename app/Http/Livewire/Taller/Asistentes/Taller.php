<?php

namespace App\Http\Livewire\Taller\Asistentes;

use Livewire\Component;
use App\Models\Taller as ModelsTaller;
use App\Mail\PosponerTaller;
use Illuminate\Support\Facades\Mail;

class Taller extends Component
{

    public $taller, $observacion, $fecha, $hora;

    protected $rules = [
        "observacion" => 'required|string|min:10|max:255',
        "fecha" => 'required',
        "hora" => 'required',
    ];

    protected $listeners = [
        "eliminarAsistente",
        "posponerTaller",
    ];

    public function eliminarAsistente(array $seleccionado) {
        $this->dispatchBrowserEvent("prueba", array("test"=>$seleccionado));
    }

    public function posponerTaller() 
    {

        $this->validate();

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
