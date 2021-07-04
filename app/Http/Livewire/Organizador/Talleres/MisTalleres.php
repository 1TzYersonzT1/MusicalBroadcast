<?php

namespace App\Http\Livewire\Organizador\Talleres;

use App\Models\HojaVida;
use Livewire\Component;
use Auth;
use App\Models\Taller;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class MisTalleres extends Component
{

    /**
     * Trait utilizado para la utilizacion de paginacion
     */
    use WithPagination;

    public $talleresPendientes,
        $talleresRevisados,
        $talleresAprobados,
        $talleresModificados,
        $hojaVida;

    /**
     * Selecciona la hoja de vida del organizador autenticado
     * y ademas seleccionas los talleres que este tiene asociado
     * basado en los siguientes estados de solicitud
     * 0 - Pendiente
     * 1 - Revisada
     * 2 - (No aplica reservada para futura implementacion)
     * 3 - Aprobada
     * 4 - Modificada
     */
    public function mount()
    {

        $this->hojaVida = HojaVida::where("user_rut", auth()->user()->rut)->get();

        $this->talleresPendientes = Taller::whereHas('solicitudes', function (Builder $query) {
            $query->where("estado", 0);
        })
            ->where("user_rut", auth()->user()->rut)
            ->get();

        $this->talleresRevisados = Taller::whereHas('solicitudes', function (Builder $query) {
            $query->where("estado", 1);
        })
            ->where("user_rut", auth()->user()->rut)
            ->get();

        $this->talleresAprobados = Taller::whereHas('solicitudes', function (Builder $query) {
            $query->where("estado", 3)
                ->orWhere('estado', 5);
        })
            ->where("user_rut", auth()->user()->rut)
            ->get();

        $this->talleresModificados = Taller::whereHas('solicitudes', function (Builder $query) {
            $query->where("estado", 4);
        })
            ->where("user_rut", auth()->user()->rut)
            ->get();
    }

    public function render()
    {
        return view('livewire.organizador.talleres.mis-talleres', []);
    }
}
