<?php

namespace App\Http\Livewire\Evento;

use App\Mail\NuevoAsistenteEvento;
use App\Mail\PeticionEventoExitosa;
use Livewire\Component;
use App\Models\Evento;
use App\Models\Artista;
use Illuminate\Support\Facades\Mail;

class EventoPreview extends Component
{

    public $eventoActual, $artistasSeleccionados = [];

    protected $listeners = [
        "visualizar-evento" => 'visualizar',
        'aprobarEvento',
        'validarPeticiones',
        'envioPeticionesConfirmado',
        'updatedArtistasSeleccionados',
    ];

    protected $messages = [
        'artistasSeleccionados.required' => 'Debe seleccionar al menos 1 artista antes de enviar una petición.'
    ];

    public function visualizar(array $eventoSeleccionado)
    {
        $this->eventoActual = Evento::find($eventoSeleccionado["id"]);
        $this->dispatchBrowserEvent("mostrarEvento", array("slideActual" => $eventoSeleccionado["slideActual"]));
    }

    public function validarPeticiones()
    {
        $this->validate([
            'artistasSeleccionados' => 'required|array|min:0',
        ]);
        $this->dispatchBrowserEvent('confirmarEnvioPeticiones');
    }

    public function envioPeticionesConfirmado()
    {
        foreach($this->artistasSeleccionados as $artistaSeleccionado) {

            $artista = Artista::find($artistaSeleccionado);

            $mensaje = [
                "artista" => $artista,
                "evento" => $this->eventoActual,
                "organizador" => $this->eventoActual->organizador,
            ];

            Mail::to($this->eventoActual->organizador)->send(new NuevoAsistenteEvento($mensaje));
            Mail::to($artista->representante->email)->send(new PeticionEventoExitosa($mensaje));
        }
        $this->eventoActual->artistas()->syncWithoutDetaching($this->artistasSeleccionados);
    }

    public function updatedArtistasSeleccionados($value)
    {
        $this->artistasSeleccionados = $value;
    }

    public function render()
    {
        return view('livewire.evento.evento-preview');
    }
}
