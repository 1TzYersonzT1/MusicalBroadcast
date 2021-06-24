<?php

namespace App\Http\Livewire\Evento;

use Livewire\Component;
use App\Models\Evento;
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

    public function visualizar(array $eventoSeleccionado) {
        $this->eventoActual = Evento::find($eventoSeleccionado["id"]);
        $this->dispatchBrowserEvent("mostrarEvento", array("slideActual" => $eventoSeleccionado["slideActual"]));
    }

    public function validarPeticiones() {
        $this->validate([
            'artistasSeleccionados' => 'required|array|min:0',
        ]);
        $this->dispatchBrowserEvent('confirmarEnvioPeticiones');
    }

    public function envioPeticionesConfirmado() {
        foreach($this->artistasSeleccionados as $artistaSeleccionado) {
            $mensaje = [
                'evento' => $this->eventoActual,
                'artista' => $this->artistaSeleccionado,
            ];

            Mail::to($this->artistaSeleccionado->representante->email)->send();
            Mail::to($this->artistaSeleccionado->representante->email)->send();
        }


        $this->eventoActual->artistas()->syncWithoutDetaching($this->artistasSeleccionados);
    }

    public function updatedArtistasSeleccionados($value) {
        $this->artistasSeleccionados = $value;
    }

    public function render()
    {
        return view('livewire.evento.evento-preview');
    }
}
