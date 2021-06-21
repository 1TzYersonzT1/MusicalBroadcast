<?php

namespace App\Http\Livewire\Organizador\Eventos\Asistentes;

use App\Models\Evento;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Asistentes extends Component
{
    public function render()
    {
        return view('livewire.organizador.eventos.asistentes.asistentes', [
            'eventos' => Evento::whereHas('solicitudes', function (Builder $query) {
                $query->where("estado", 3)
                ->orWhere("estado", 5);
            })->where("user_rut", auth()->user()->rut)->paginate(1)
        ]);
    }
}
