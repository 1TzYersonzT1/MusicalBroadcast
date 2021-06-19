<?php

namespace App\Http\Livewire\Administrador\Talleres;

use Livewire\Component;
use App\Models\SolicitudTaller;
use App\Models\Taller;
use App\Models\HojaVida;
use Illuminate\Support\Facades\Storage;

class TallerPreview extends Component
{

    public $solicitudActual, $observacion;

    protected $rules = [
        'observacion' => 'required|string|min:10|max:255|',
    ];

    protected $listeners = [
        'visualizarSolicitud', 
        'aprobarTaller',
        'eliminarTaller',
    ];

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

        return redirect()->route("administrador.talleres");
    }


    public function enviarObservacion() {

        $this->validate();

        $solicitud = SolicitudTaller::find($this->solicitudActual->id);
        $solicitud->observacion = $this->observacion;
        $solicitud->estado = 1;
        $solicitud->taller->estado = 0;
        $solicitud->taller->save();
        $solicitud->save();

        $this->dispatchBrowserEvent("observacionAniadida");
    }

    public function eliminarTaller() {
        $taller = Taller::find($this->solicitudActual->taller->id);
        Storage::delete($taller->imagen);

        $hojaVida = HojaVida::where("user_rut", $taller->user_rut)->get();
        $hojaVida[0]->talleres_rechazados = $hojaVida[0]->talleres_rechazados + 1;
        $hojaVida[0]->save();

        $taller->solicitudes()->delete();
        $taller->delete();
    }

    public function render()
    {
        return view('livewire.administrador.talleres.taller-preview');
    }
}
