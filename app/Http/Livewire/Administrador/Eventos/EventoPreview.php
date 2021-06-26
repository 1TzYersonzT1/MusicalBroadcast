<?php

namespace App\Http\Livewire\Administrador\Eventos;

use Livewire\Component;
use App\Models\SolicitudEvento;
use App\Models\Evento;
use App\Models\HojaVida;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\Eventos\Administrador\EventoAprobado;
use App\Mail\Eventos\Administrador\EventoRechazado;

class EventoPreview extends Component
{

    public $solicitudActual, $observacion;

    protected $rules = [
        "observacion" => 'required|string|min:10|max:255',
    ];

    protected $listeners = [
        "mostrarEvento",
        "aprobarEvento",
        "eliminarEvento",
    ];

    public function mostrarEvento(array $evento)
    {
        $this->solicitudActual = SolicitudEvento::findOrFail($evento["id"]);
        $this->dispatchBrowserEvent("mostrarSolicitudEvento", array("slideActual" => $evento["actual"]));
    }

    public function aprobarEvento()
    {
        $evento = Evento::find($this->solicitudActual->evento->id);
        $evento->estado = 1;
        $evento->save();

        $hojaVida = HojaVida::where("user_rut", $evento->user_rut)->get();
        
        $hojaVida[0]->eventos_aprobados = $hojaVida[0]->eventos_aprobados + 1;
        $hojaVida[0]->save();

        $solicitud = SolicitudEvento::find($this->solicitudActual->id);
        $solicitud->estado = 3;
        $solicitud->save();

        $mensaje = [
            "evento" => $evento,
            "organizador" => $evento->organizador,
        ];

        Mail::to($evento->organizador->email)->send(new EventoAprobado($mensaje));

        return redirect()->route("administrador.eventos");
    }

    public function enviarObservacion()
    {

        $this->validate();

        $solicitud = SolicitudEvento::find($this->solicitudActual->id);
        $solicitud->estado = 1;
        $solicitud->observacion = $this->observacion;
        $solicitud->save();

        $this->dispatchBrowserEvent("observacionAniadida");
    }

    public function eliminarEvento()
    {
        $evento = Evento::find($this->solicitudActual->evento->id);
        Storage::delete($evento->imagen);

        $hojaVida = HojaVida::where("user_rut", $evento->user_rut)->get();
        $hojaVida[0]->eventos_rechazados = $hojaVida[0]->eventos_rechazados + 1;
        $hojaVida[0]->save();

        $mensaje = [
            "evento" => $evento,
            "organizador" => $evento->organizador,
        ];

        Mail::to($evento->organizador->email)->send(new EventoRechazado($mensaje));

        $evento->solicitudes()->delete();
        $evento->delete();
    }

    public function render()
    {
        return view('livewire.administrador.eventos.evento-preview');
    }
}
