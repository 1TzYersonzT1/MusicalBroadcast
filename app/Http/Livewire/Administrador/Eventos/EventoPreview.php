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

    /**
     * Regla para validar que el administrador
     * esta retroalimentando la solicitud del evento
     */
    protected $rules = [
        "observacion" => 'required|string|min:10|max:255',
    ];

    protected $listeners = [
        "mostrarEvento",
        "aprobarEvento",
        "eliminarEvento",
    ];

    /**
     * Esta funcion es emitida desde Evento, con el evento
     * seleccionado es posible visualizar su solicitud asociada
     * y controlar el slider enviando el indice hacia un evento
     * de navegador
     */
    public function mostrarEvento(array $evento)
    {
        $this->solicitudActual = SolicitudEvento::findOrFail($evento["id"]);
        $this->dispatchBrowserEvent("mostrarSolicitudEvento", array("slideActual" => $evento["actual"]));
    }


    /**
     * El evento que se encuentra seleccionado cambia su estado
     * a activo (1), se modifica la hoja de vida del organizador
     * para contabilizar un nuevo evento aprobado, se modifica
     * la solicitud del evento a aprobada (3) y se envia un correo
     * al organizador.
     * @return redirect
     */
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

    /**
     * Valida si la observacion ha sido agregada, luego 
     * busca la solicitud del evento actual y le agrega
     * la observacion que ha sido escrita por el administrador,
     * cambia el estado de la solicitud a revisada (1) y se emite
     * una alerta de exito
     */
    public function enviarObservacion()
    {
        $this->validate();

        $solicitud = SolicitudEvento::find($this->solicitudActual->id);
        $solicitud->estado = 1;
        $solicitud->observacion = $this->observacion;
        $solicitud->save();

        $this->dispatchBrowserEvent("observacionAniadida");
    }

    /**
     * Elimina la imagen del evento seleccionado, modifica la hoja
     * de vida del organizador para contabilizar un nuevo evento
     * rechazado, luego envia un correo al organizador informando
     * acerca de la accion y finalmente elimina toda la informacion
     * que esta asociada al evento.
     */
    public function eliminarEvento()
    {
        $evento = Evento::find($this->solicitudActual->evento->id);
        $disk = Storage::disk("azure");
        $disk->delete($evento->imagen);
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
