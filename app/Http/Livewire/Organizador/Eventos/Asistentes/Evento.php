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

    protected $rules = [
        "observacion_pospuesto" => 'required|string|min:10|max:255',
        "fecha" => 'required',
        "hora" => 'required',
    ];

    public function posponerEvento()
    {
        $this->validate();
        $this->dispatchBrowserEvent('posponerEvento');
    }

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

    public function cancelarEvento() {
        $this->validate([
            'observacion_cancelado' => 'required|string|min:10|max:255',
        ]);
        $this->dispatchBrowserEvent("cancelarEvento");
    }

    public function cancelarEventoConfirmado() {
        foreach($this->evento->artistas as $artista) {
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


    public function eliminarArtista($index)
    {
        $this->indexSeleccionado = $index;
        $this->dispatchBrowserEvent("eliminarArtistaEvento");
    }

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
