<?php

namespace App\Http\Livewire\Organizador\Eventos\Asistentes;

use App\Models\Evento;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Asistentes extends Component
{

    /**
     * Envia a la vista asociada los eventos que pertenecen
     * al organizador que se encuentre autenticado ademas de 
     * considerar que las solicitudes que estan
     * asociadas a este se encuentren en estado aprobado (3) o
     * pospuesto (5), finalmente realiza la pagination de uno en uno
     */
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
