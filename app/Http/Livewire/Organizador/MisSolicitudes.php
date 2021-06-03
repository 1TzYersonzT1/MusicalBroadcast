<?php

namespace App\Http\Livewire\Organizador;

use Livewire\Component;
use Auth;
use App\Models\Taller;
use Livewire\WithPagination;

class MisSolicitudes extends Component
{

    use WithPagination;

    public function render()
    {
        return view('livewire.organizador.mis-solicitudes', [
            'talleres' => Taller::where('user_rut', auth()->user()->rut)->paginate(1)
        ]);
    }
}
