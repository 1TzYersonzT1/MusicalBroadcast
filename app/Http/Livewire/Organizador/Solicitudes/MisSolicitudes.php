<?php

namespace App\Http\Livewire\Organizador\Solicitudes;

use Livewire\Component;
use Auth;
use App\Models\Taller;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class MisSolicitudes extends Component
{

    use WithPagination;

    public $talleresPendientes, $talleresRevisados;

    public function mount() {
        $this->talleresPendientes = Taller::whereHas('solicitudes', function (Builder $query) {
            $query->where("estado", "=", 0);
        })->get();
        $this->talleresRevisados = Taller::whereHas('solicitudes', function (Builder $query) {
            $query->where("estado", 1);
        })->get();
    }

    public function render()
    {
        return view('livewire.organizador.solicitudes.mis-solicitudes', [
          
        ]);
    }
}
