<?php

namespace App\Http\Livewire\Administrador\Solicitudes;

use Livewire\Component;
use App\Models\SolicitudTaller;
use App\Models\Taller;

class SolicitudPreview extends Component
{

    public $solicitudActual, $observacion;

    protected $listeners = ['visualizarSolicitud', 'aprobarTaller'];

    public function visualizarSolicitud(array $solicitudSeleccionada)
    {
        $this->solicitudActual = SolicitudTaller::findOrFail($solicitudSeleccionada['id']);
        $this->dispatchBrowserEvent("mostrarSolicitud", array("slideActual" => $solicitudSeleccionada["slideActual"]));
    }

    public function aprobarTaller()
    {
        $taller = Taller::find($this->solicitudActual->taller->id);
        $taller->estado = 1;
        $taller->save();

        $solicitud = SolicitudTaller::find($this->solicitudActual->id);
        $solicitud->estado = 3;
        $solicitud->observacion = '';
        $solicitud->save();

        return redirect()->route("administrador.solicitudes");
    }


    public function enviarObservacion() {
        $solicitud = SolicitudTaller::find($this->solicitudActual->id);
        $solicitud->observacion = $this->observacion;
        $solicitud->estado = 1;
        $solicitud->save();

        $this->dispatchBrowserEvent("observacionAniadida");
    }

    public function render()
    {
        return view('livewire.administrador.solicitudes.solicitud-preview');
    }
}
