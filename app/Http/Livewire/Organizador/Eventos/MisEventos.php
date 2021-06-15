<?php

namespace App\Http\Livewire\Organizador\Eventos;

use Livewire\Component;
use App\Models\Evento;
use Illuminate\Database\Eloquent\Builder;

class MisEventos extends Component
{

    public $eventosPendientes, $eventosRevisados, $eventosAprobados, $eventosModificados;

    public function mount() {
        $this->eventosPendientes = Evento::whereHas('solicitudes', function (Builder $query) {
            $query->where("estado", 0);
        })
        ->where("user_rut", auth()->user()->rut)
        ->get();

        $this->eventosRevisados = Evento::whereHas('solicitudes', function (Builder $query) {
            $query->where("estado", 1);
        })
        ->where("user_rut", auth()->user()->rut)
        ->get();

        $this->eventosAprobados = Evento::whereHas('solicitudes', function (Builder $query) {
            $query->where("estado", 3);
        })
        ->where("user_rut", auth()->user()->rut)
        ->get();

        $this->eventosModificados = Evento::whereHas('solicitudes', function (Builder $query) {
            $query->where("estado", 4);
        })
        ->where("user_rut", auth()->user()->rut)
        ->get();
    }


    public function render()
    {
        return view('livewire.organizador.eventos.mis-eventos');
    }
}
