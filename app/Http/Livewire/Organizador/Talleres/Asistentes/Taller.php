<?php

namespace App\Http\Livewire\Organizador\Talleres\Asistentes;

use Livewire\Component;
use App\Models\Taller as ModelsTaller;
use App\Mail\PosponerTaller;
use App\Mail\CancelarTaller;
use App\Mail\EliminadoDeTaller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use DateTime;

class Taller extends Component
{

    public $taller, $indexAsistente, $observacion_pospuesto, $observacion_cancelado, $fecha, $hora;

    protected $rules = [
        "observacion_pospuesto" => 'required|string|max:255',
        "fecha" => 'required',
        "hora" => 'required',
    ];

    protected $listeners = [
        "eliminarAsistenteConfirmado",
        "posponerTallerConfirmado",
        "cancelarTallerConfirmado",
    ];


    public function eliminar($index)
    {
        $this->indexAsistente = $index;
        $this->dispatchBrowserEvent("eliminarAsistente");
    }

    public function eliminarAsistenteConfirmado()
    {
        $asistente = $this->taller->asistentes[$this->indexAsistente];
        $this->taller->asistentes()->detach($asistente);
        $this->taller->TAL_Aforo = $this->taller->TAL_Aforo + 1;
        $this->taller->save();

        $mensaje = [
            "taller" => $this->taller->TAL_Nombre,
            "fecha" => Carbon::parse(new DateTime())->isoFormat("LLLL"),
            "asistente" => $asistente,
        ];

        Mail::to($asistente->email)->send(new EliminadoDeTaller($mensaje));
        
    }

    public function posponerTaller()
    {
        $this->validate();
        $this->dispatchBrowserEvent("posponerTaller");
    }

    public function posponerTallerConfirmado()
    {
        $this->taller->TAL_Fecha = Carbon::parse(date_create($this->fecha))->isoFormat("Y-M-D");
        $this->taller->TAL_Hora = $this->hora;
        $this->taller->solicitudes[0]->estado = 5;
        $this->taller->solicitudes[0]->observacion = $this->observacion_pospuesto;
        $this->taller->solicitudes[0]->save();
        $this->taller->save();


        foreach ($this->taller->asistentes as $asistente) {
            $mensaje = [
                "taller" => $this->taller,
                "asistente" => $asistente,
            ];

            Mail::to($asistente->email)->send(new PosponerTaller($mensaje));
        }
    }

    public function cancelarTaller() {
        $this->validate([
            "observacion_cancelado" => 'required|string|max:255',
        ]);
        $this->dispatchBrowserEvent("cancelarTaller");
    }

    public function cancelarTallerConfirmado() {

        foreach($this->taller->asistentes as $asistente) {
            $mensaje = [
                "taller" => $this->taller,
                "asistente" => $asistente,
            ];

            Mail::to($asistente->email)->send(new CancelarTaller($mensaje));
        }

        $this->taller->asistentes()->detach();
        $this->taller->solicitudes[0]->delete();
        $this->taller->save();
        $this->taller->delete();
    }

    public function render()
    {
        return view('livewire.organizador.talleres.asistentes.taller');
    }
}
