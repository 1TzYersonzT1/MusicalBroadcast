<?php

namespace App\Http\Livewire\Taller\Asistentes;

use Livewire\Component;
use App\Models\Taller as ModelsTaller;
use App\Mail\PosponerTaller;
use App\Mail\EliminadoDeTaller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use DateTime;

class Taller extends Component
{

    public $taller, $indexAsistente, $observacion, $fecha, $hora;

    protected $rules = [
        "observacion" => 'required|string|max:255',
        "fecha" => 'required',
        "hora" => 'required',
    ];

    protected $listeners = [
        "eliminarAsistenteConfirmado",
        "eliminarAsistente",
        "posponerTallerConfirmado",
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
        $this->taller->solicitudes[0]->observacion = $this->observacion;
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

    public function render()
    {
        return view('livewire.taller.asistentes.taller');
    }
}
