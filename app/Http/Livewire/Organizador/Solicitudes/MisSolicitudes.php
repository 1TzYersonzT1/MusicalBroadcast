<?php

namespace App\Http\Livewire\Organizador\Solicitudes;

use Livewire\Component;
use Auth;
use App\Models\Taller;
use Livewire\WithPagination;

class MisSolicitudes extends Component
{

    use WithPagination;

    public $solicitudes;

    protected $listeners = ['busqueda'];

    public function mount()
    {
        $this->solicitudes = Taller::where("user_rut", auth()->user()->rut)->get();
    }

    public function busqueda($resultados) {
        $this->solicitudes = $resultados;
    }


    public function render()
    {
        return view('livewire.organizador.solicitudes.mis-solicitudes');
    }
}
