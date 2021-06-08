<?php

namespace App\Http\Livewire\Organizador;

use Livewire\Component;
use Auth;
use App\Models\Taller;
use Livewire\WithPagination;

class MisSolicitudes extends Component
{

    use WithPagination;

    public $solicitudes;

    public function mount()
    {
        $this->solicitudes = Taller::where("user_rut", auth()->user()->rut)->get();
    }

    public function render()
    {
        return view('livewire.organizador.mis-solicitudes');
    }
}
