<?php

namespace App\Http\Livewire\Administrador\Artistas;

use Livewire\Component;
use App\Models\SolicitudArtista;
use App\Mail\Artista\ArtistaAprobado;
use App\Mail\Artista\ArtistaRechazado;
use App\Models\Artista;
use Illuminate\Support\Facades\Mail;

class Artistas extends Component
{

    public $artistasPendientes, $artistaSeleccionado, $observacion;

    protected $listeners = [
        "confirmarAgregarArtista",
        "confirmarObservacionArtista",
        "confirmarEliminarArtista",
    ];

    public function mount() {
        $this->artistasPendientes = SolicitudArtista::where("estado", '!=', 3)->get();
    }

    public function validarAprobarArtista($id) {
        $this->artistaSeleccionado = Artista::find($id);
        $this->dispatchBrowserEvent("validarAprobarArtista");
    }

    public function confirmarAgregarArtista() {
        $this->artistaSeleccionado->solicitud->estado = 3;
        $this->artistaSeleccionado->solicitud->save();
        $this->artistaSeleccionado->estado = 1;
        $this->artistaSeleccionado->save();

        $mensaje = [
            'artista' => $this->artistaSeleccionado,
            'representante' => $this->artistaSeleccionado->representante,
        ];

        Mail::to($this->artistaSeleccionado->representante->email)->send(new ArtistaAprobado($mensaje));
    }

    public function validarObservacionArtista($id) {
        $this->validate([
            "observacion" => 'required|string|min:10|max:255',
        ]);
        $this->artistaSeleccionado = Artista::find($id);
        $this->dispatchBrowserEvent("validarObservacionArtista");
    }

    public function confirmarObservacionArtista() {
        $this->artistaSeleccionado->solicitud->observacion = $this->observacion;
        $this->artistaSeleccionado->solicitud->estado = 1;
        $this->artistaSeleccionado->solicitud->save();
    }

    public function validarEliminarArtista($id) {
        $this->artistaSeleccionado = Artista::find($id);
        $this->dispatchBrowserEvent("validarEliminarArtista");
    }

    public function confirmarEliminarArtista() {

        $mensaje = [
            "artista" => $this->artistaSeleccionado->ART_Nombre,
            'representante' => $this->artistaSeleccionado->representante,
        ];

        Mail::to($this->artistaSeleccionado->representante->email)->send(new ArtistaRechazado($mensaje));

        $this->artistaSeleccionado->solicitud()->delete();
        $this->artistaSeleccionado->estilos()->detach();
        $this->artistaSeleccionado->eventos()->delete();
        $this->artistaSeleccionado->integrantes()->delete();
        $this->artistaSeleccionado->albumes()->delete();
        $this->artistaSeleccionado->delete();
    }

    public function render()
    {
        return view('livewire.administrador.artistas.artistas');
    }
}
