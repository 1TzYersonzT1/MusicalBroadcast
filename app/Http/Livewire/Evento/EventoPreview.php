<?php

namespace App\Http\Livewire\Evento;

use Livewire\Component;
use App\Models\Evento;

class EventoPreview extends Component
{

    public $eventoActual;

    protected $listeners = ["visualizar-evento" => 'visualizar'];

    public function visualizar(array $eventoSeleccionado) {
        $this->eventoActual = Evento::find($eventoSeleccionado["id"]);
    }

    public function render()
    {
        return view('livewire.evento.evento-preview');
    }
}
