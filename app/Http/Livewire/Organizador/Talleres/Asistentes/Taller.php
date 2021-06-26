<?php

namespace App\Http\Livewire\Organizador\Talleres\Asistentes;

use Livewire\Component;
use App\Mail\Talleres\Organizador\PosponerTaller;
use App\Mail\Talleres\Organizador\TallerCancelado;
use App\Mail\Talleres\Organizador\AsistenteEliminado;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use DateTime;

class Taller extends Component
{

    public $taller, $indexAsistente, $observacion_pospuesto, $observacion_cancelado, $fecha, $hora;

    /**
     * Reglas de validacion para posponerTaller
     */
    protected $rules = [
        "observacion_pospuesto" => 'required|string|max:255',
        "fecha" => 'required',
        "hora" => 'required',
    ];

    /**
     * Eventos que son llamados desde 
     * las ventanas de alerta que han
     * sido confirmadas.
     */
    protected $listeners = [
        "eliminarAsistenteConfirmado",
        "posponerTallerConfirmado",
        "cancelarTallerConfirmado",
    ];

    /**
     * Traspasa el valor del parametro a una variable
     * la cual contiene el indice del asistente que se
     * desea eliminar. Luego despacha un evento al navegador
     * para solicitar la confirmación al organizador.
     */
    public function eliminar($index)
    {
        $this->indexAsistente = $index;
        $this->dispatchBrowserEvent("eliminarAsistente");
    }

    /**
     * Una vez que el organizador ha confirmado la ventana emergente
     * se busca y elimina de entre los asistentes del taller al 
     * asistente que ha sido seleccionado, se le agrega 1 cupo al taller
     * y se notifica al asistente eliminado de la accion.
     */
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

        Mail::to($asistente->email)->send(new AsistenteEliminado($mensaje));
    }

    /**
     * Verifica si el organizador del taller ha indicado
     * el motivo por el cual pospone el taller además
     * de la fecha y hora en la que se realizará nuevamente
     */
    public function posponerTaller()
    {
        $this->validate();
        $this->dispatchBrowserEvent("posponerTaller");
    }

    /**
     * Una vez que el organizador ha confirmado posponer el taller
     * se modifica la nueva fecha y hora en la que se realizará el taller,
     * además el estado de la solicitud cambia a (5 - pospuesta), se agrega 
     * el motivo por el cual se ha pospuesto el taller. Finalmente se envia
     * un correo a cada asistentes que se ha inscrito indicando la accion.
     */
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

    /**
     * Verifica si el campo de observacion ha sido completado, si 
     * esta completo se envia una alerta de confirmación, caso 
     * contrario un mensaje de error el cuál es recibido en el
     * front-end.
     */
    public function cancelarTaller()
    {
        $this->validate([
            "observacion_cancelado" => 'required|string|max:255',
        ]);
        $this->dispatchBrowserEvent("cancelarTaller");
    }

    /**
     * Una vez que el organizador haya confirmado eliminar el taller
     * se enviara un correo para cada asistentes que se haya inscrito
     * y posteriormente se eliminara el taller junto a los asistentes
     * y solicitudes de la base de datos.
     */
    public function cancelarTallerConfirmado()
    {
        foreach ($this->taller->asistentes as $asistente) {
            $mensaje = [
                "taller" => $this->taller,
                "asistente" => $asistente,
            ];

            Mail::to($asistente->email)->send(new TallerCancelado($mensaje));
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
