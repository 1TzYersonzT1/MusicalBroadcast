<?php

namespace App\Http\Livewire\Evento;

use Livewire\Component;
use App\Models\Evento;

class EventoPreview extends Component
{

    public $eventoActual;

    protected $listeners = [
        "visualizar-evento" => 'visualizar',
        'aprobarEvento',
    ];

    public function visualizar(array $eventoSeleccionado) {
        $this->eventoActual = Evento::find($eventoSeleccionado["id"]);
        $this->dispatchBrowserEvent("mostrarEvento", array("slideActual" => $eventoSeleccionado["slideActual"]));
    }

    public function render()
    {
        return view('livewire.evento.evento-preview');
    }
}
