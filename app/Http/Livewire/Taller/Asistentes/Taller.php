<?php

namespace App\Http\Livewire\Taller\Asistentes;

use Livewire\Component;
use App\Models\Taller as ModelsTaller;
use App\Mail\PosponerTaller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class Taller extends Component
{

    public $taller, $observacion, $fecha, $hora;

    protected $rules = [
        "observacion" => 'required|string|max:255',
        "fecha" => 'required',
        "hora" => 'required',
    ];

    protected $listeners = [
        "eliminarAsistente",
        "posponerTallerConfirmado",
    ];

    public function eliminarAsistente(array $seleccionado) {
        $this->dispatchBrowserEvent("prueba", array("test"=>$seleccionado));
    }

    public function posponerTaller() 
    {
        $this->validate();
        $this->dispatchBrowserEvent("posponerTaller");
    }

    public function posponerTallerConfirmado() {
        
        $this->taller->TAL_Fecha = Carbon::parse(date_create($this->fecha))->isoFormat("Y-M-D");
        $this->taller->TAL_Hora = $this->hora;
        $this->taller->solicitudes[0]->estado = 5;
        $this->taller->solicitudes[0]->observacion = $this->observacion;
        $this->taller->solicitudes[0]->save();
        $this->taller->save();

        
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
