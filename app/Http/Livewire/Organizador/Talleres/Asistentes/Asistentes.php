<?php

namespace App\Http\Livewire\Organizador\Talleres\Asistentes;

use Livewire\Component;
use App\Models\Taller;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class Asistentes extends Component
{

    /**
     * Trait necesario para utilizar la paginacion
     */
    use WithPagination;

    /**
     * Envia a la vista indicada los talleres que han sido
     * organizados por el usuario autenticado  los cuales
     *  tienen asociadas solicitudes ya sea en estado aprobada (3)
     * o pospuesto(5) 
     */
    public function render()
    {
        return view('livewire.organizador.talleres.asistentes.asistentes', [
            'talleres' => Taller::whereHas('solicitudes', function (Builder $query) {
                $query->where("estado", 3)
                    ->orWhere("estado", 5);
            })->where("user_rut", auth()->user()->rut)->paginate(1)
        ]);
    }
}
