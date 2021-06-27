<?php

namespace App\Http\Livewire\Organizador\Eventos\Asistentes;

use Livewire\Component;
use App\Mail\Eventos\Organizador\ArtistaEliminado;
use App\Mail\Eventos\Organizador\PosponerEvento;
use App\Mail\Eventos\Organizador\EventoCancelado;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use DateTime;

class Evento extends Component
{

    public $evento, $indexSeleccionado, $observacion_pospuesto, $observacion_cancelado, $fecha, $hora;

    protected $listeners = [
        'eliminarArtistaConfirmado',
        'posponerEventoConfirmado',
        'cancelarEventoConfirmado',
    ];

    /**
     * Se encarga de validar que el organizador
     * del evento ha indicado los motivos por el cual
     * pospone el evento ademas de la fecha y hora
     * en la que planea realizar el evento
     */
    protected $rules = [
        "observacion_pospuesto" => 'required|string|min:10|max:255',
        "fecha" => 'required',
        "hora" => 'required',
    ];

    /**
     * Verifica si el organizador ha completado los campos
     * del formulario para posponer un evento, si ha sido asi
     * se emite una alerta para confirmar la accion
     */
    public function posponerEvento()
    {
        $this->validate();
        $this->dispatchBrowserEvent('posponerEvento');
    }

    /**
     * Una vez que el organizador ha confirmado la alerta
     * se modifica la fecha y hora del evento por las nuevas,
     * el estado del evento pasa a inactivo(0) el estado de la
     * solicitud asociada pasa a pospuesta(5) y se agrega
     * a la observacion los comentarios del organizador,
     * finalmente para cada representante que haya inscrito
     * a artistas se le notifica por mail la accion 
     */
    public function posponerEventoConfirmado()
    {
        $this->evento->EVE_Fecha = Carbon::parse(date_create($this->fecha))->isoFormat("Y-M-D");
        $this->evento->EVE_Hora = $this->hora;
        $this->evento->estado = 0;
        $this->evento->solicitudes[0]->estado = 5;
        $this->evento->solicitudes[0]->observacion = $this->observacion_pospuesto;
        $this->evento->solicitudes[0]->save();
        $this->evento->save();

        foreach ($this->evento->artistas as $artista) {
            $mensaje = [
                "representante" => $artista->representante,
                "evento" => $this->evento,
                "artista" => $artista->ART_Nombre,
            ];

            Mail::to($artista->representante->email)->send(new PosponerEvento($mensaje));
        }
    }

    /**
     * Verifica si el organizador esta indicando
     * los motivos por el cual esta cancelando el evento,
     * si ha indicado los motivos se envia una alerta
     * para confirmar la accion
     */
    public function cancelarEvento()
    {
        $this->validate([
            'observacion_cancelado' => 'required|string|min:10|max:255',
        ]);
        $this->dispatchBrowserEvent("cancelarEvento");
    }

    /**
     * Una vez que el organizador del evento ha confirmado
     * la accion se le envia a cada uno de los representantes
     * que hayan inscrito artistas un correo indicando la accion
     * que se ha tomado, finalmente se elimina toda la informacion
     * asociada al evento.
     */
    public function cancelarEventoConfirmado()
    {
        foreach ($this->evento->artistas as $artista) {
            $mensaje = [
                'representante' => $artista->representante,
                'evento' => $this->evento,
                'artista' => $artista->ART_Nombre,
            ];

            Mail::to($artista->representante->email)->send(new EventoCancelado($mensaje));
        }

        $this->evento->artistas()->detach();
        $this->evento->solicitudes()->delete();
        $this->evento->delete();
    }

    /**
     * Almacena en otra variable el indice del artista que se desea
     * eliminar y se envia una alerta para confirmar la accion
     */
    public function eliminarArtista($index)
    {
        $this->indexSeleccionado = $index;
        $this->dispatchBrowserEvent("eliminarArtistaEvento");
    }

    /**
     * Una vez que el organizador del evento ha confirmado
     * la accion se selecciona de entre los artistas asistentes
     * al que se la seleccionado y se retira de la tabla intermedia
     * ademas se envia un correo al representante de dicho artista
     * para indicarle la decision que se ha tomado
     */
    public function eliminarArtistaConfirmado()
    {
        $artista = $this->evento->artistas[$this->indexSeleccionado];
        $this->evento->artistas()->detach($artista);

        $mensaje = [
            'representante' => $artista->representante,
            'evento' => $this->evento->EVE_Nombre,
            'artista' => $artista,
            'fecha' => Carbon::parse(new DateTime())->isoFormat("LLLL"),
        ];

        Mail::to($artista->representante->email)->send(new ArtistaEliminado($mensaje));
    }

    public function render()
    {
        return view('livewire.organizador.eventos.asistentes.evento');
    }
}
