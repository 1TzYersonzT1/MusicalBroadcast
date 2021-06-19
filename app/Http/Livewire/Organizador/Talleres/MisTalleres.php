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

    use WithPagination;

    public $talleresPendientes, 
    $talleresRevisados, 
    $talleresAprobados, 
    $talleresModificados,
    $hojaVida;

    public function mount() {

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
            ->orWhere('estado' , 5);
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
        return view('livewire.organizador.talleres.mis-talleres', [
          
        ]);
    }
}
