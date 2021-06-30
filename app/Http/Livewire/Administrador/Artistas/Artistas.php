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

    public $artistasPendientes=[], $artistaSeleccionado, $observacion;

    protected $listeners = [
        "confirmarAgregarArtista",
        "confirmarObservacionArtista",
        "confirmarEliminarArtista",
    ];

    /**
     * Al cargarse el componente se seleccionan todos los artistas
     * que tengan una solicitud que no sea aprobada
     */
    public function mount()
    {
        $this->artistasPendientes = SolicitudArtista::where("estado", '!=', 3)->get();
    }

    /**
     * Busca a un artista segun el id indicado,
     * lueog envia una alerta para confirmar la accion
     */
    public function validarAprobarArtista($id)
    {
        $this->artistaSeleccionado = Artista::find($id);
        $this->dispatchBrowserEvent("validarAprobarArtista");
    }

    /**
     * Una vez que el administrador ha confirmado la alerta
     * se modifica el estado de la solicitud a aprobada (3)
     * y el estado del artista pasa a activo(1), finalmente
     * se le envia un correo al representante acerca
     * de la accion
     */
    public function confirmarAgregarArtista()
    {
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

    /**
     * Verifica si el administrador ha retroalimentado la solicitud
     * con una observacion, si es correcto se selecciona el artsta de
     * la base de datos y se envia una alerta para confirmar la accion
     */
    public function validarObservacionArtista($id)
    {
        $this->validate([
            "observacion" => 'required|string|min:10|max:255',
        ]);
        $this->artistaSeleccionado = Artista::find($id);
        $this->dispatchBrowserEvent("validarObservacionArtista");
    }

    /**
     * Una vez que el administrador ha confirmado la alerta
     * se agrega a la solicitud la observacion que ha escrito
     * el administrador, se modifica el estado de la solicutud
     * a pendiente (1)
     */
    public function confirmarObservacionArtista()
    {
        $this->artistaSeleccionado->solicitud->observacion = $this->observacion;
        $this->artistaSeleccionado->solicitud->estado = 1;
        $this->artistaSeleccionado->solicitud->save();
    }

    /**
     * Se selecciona el artista de la base de datos
     * y se envia una alerta para confirmar la accion
     */
    public function validarEliminarArtista($id)
    {
        $this->artistaSeleccionado = Artista::find($id);
        $this->dispatchBrowserEvent("validarEliminarArtista");
    }


    /**
     * Una vez que el administrador ha confirmado la accion
     * se le envia un mensaje al representante del artista,
     * luego se elimina toda la información asociada al artista
     */
    public function confirmarEliminarArtista()
    {
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
