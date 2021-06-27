<?php

namespace App\Http\Livewire\Administrador\Talleres;

use Livewire\Component;
use App\Models\SolicitudTaller;
use App\Models\Taller;
use App\Models\HojaVida;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\Talleres\Administrador\TallerAprobado;
use App\Mail\Talleres\Administrador\TallerRechazado;

class TallerPreview extends Component
{

    public $solicitudActual, $observacion;

    /**
     * Reglas de validacion para enviar observacion
     */
    protected $rules = [
        'observacion' => 'required|string|min:10|max:255|',
    ];

    protected $listeners = [
        'visualizarSolicitud',
        'aprobarTaller',
        'eliminarTaller',
    ];

    /**
     * Permite visualizar la solicitud asociada a un taller 
     * la cual ha sido seleccionad el adninistrador.
     */
    public function visualizarSolicitud(array $solicitudSeleccionada)
    {
        $this->solicitudActual = SolicitudTaller::findOrFail($solicitudSeleccionada['id']);
        $this->dispatchBrowserEvent("mostrarSolicitud", array("slideActual" => $solicitudSeleccionada["slideActual"]));
    }

    /**
     * Busca el taller que esta asociado a la solicitud actual
     * y modifica su estado a aprobado (1), luego modifica
     * la solicitud actual de pendiente(0) a  aprobada(3),
     * finalmente envia un correo al organizador
     * para notificar
     * @return redirect
     */
    public function aprobarTaller()
    {
        $taller = Taller::find($this->solicitudActual->taller->id);
        $taller->estado = 1;
        $taller->save();

        $solicitud = SolicitudTaller::find($this->solicitudActual->id);
        $solicitud->estado = 3;
        $solicitud->observacion = '';
        $solicitud->save();

        $hojaVida = HojaVida::where("user_rut", $taller->user_rut)->get();

        $hojaVida[0]->talleres_aprobados = $hojaVida[0]->talleres_aprobados + 1;
        $hojaVida[0]->save();

        $mensaje = [
            "taller" => $taller,
            "organizador" => $taller->organizador,
        ];

        Mail::to($taller->organizador->email)->send(new TallerAprobado($mensaje));

        return redirect()->route("administrador.talleres");
    }

    /**
     * Verifica si el organizador ha agregado una observacion
     * de ser asi adjunta la observacion a la solicitud actual, cambia
     * su estado a revisada(1) y cambia el estado del taller
     * de activo(1) a inactivo(0)
     */
    public function enviarObservacion()
    {
        $this->validate();

        $solicitud = SolicitudTaller::find($this->solicitudActual->id);
        $solicitud->observacion = $this->observacion;
        $solicitud->estado = 1;
        $solicitud->taller->estado = 0;
        $solicitud->taller->save();
        $solicitud->save();

        $this->dispatchBrowserEvent("observacionAniadida");
    }

    /**
     * Buscar el taller que esta asociado a la solicitud actual
     * elimina todoa la información que esta asociada al taller
     * y agrega a la hoja de vida del organizador un nuevo taller
     * rechazado. Finalmente notifica por correo al organizador
     * de la acción.
     */
    public function eliminarTaller()
    {
        $taller = Taller::find($this->solicitudActual->taller->id);
        Storage::delete($taller->imagen);

        $hojaVida = HojaVida::where("user_rut", $taller->user_rut)->get();

        $hojaVida[0]->talleres_rechazados = $hojaVida[0]->talleres_rechazados + 1;
        $hojaVida[0]->save();

        $taller->solicitudes()->delete();
        $taller->delete();

        $mensaje = [
            "taller" => $taller,
            "organizador" => $taller->organizador,
        ];

        Mail::to($taller->organizador->email)->send(new TallerRechazado($mensaje));
    }

    public function render()
    {
        return view('livewire.administrador.talleres.taller-preview');
    }
}
