<?php

namespace App\Http\Livewire\Taller\Asistentes;

use Livewire\Component;
use App\Models\Taller;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class Asistentes extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.taller.asistentes.asistentes', [
            'talleres' => Taller::whereHas('solicitudes', function (Builder $query) {
                $query->where("estado", 3);
            })->where("user_rut", auth()->user()->rut)->paginate(1)
        ]);
    }
}
