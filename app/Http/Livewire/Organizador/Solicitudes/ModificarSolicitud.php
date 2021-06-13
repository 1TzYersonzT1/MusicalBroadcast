<?php

namespace App\Http\Livewire\Organizador\Solicitudes;

use Livewire\Component;
use App\Models\Taller;
use Auth;

class ModificarSolicitud extends Component
{

    public $taller, $caracteres_descripcion = 0;

    protected $rules = [
        "taller.TAL_Nombre" => 'required|string',
        'taller.TAL_Fecha' => 'required|date_format:dd-mm-aaaa',
        'taller.TAL_Hora' => 'required|date_format:H:i',
        'taller.TAL_Aforo' => 'required|integer',
        'taller.TAL_Lugar' => 'required|string',
        'taller.TAL_Descripcion' => 'required|string',
    ];

    public function mount($id) {
        
        $this->taller = Taller::find($id);

        if($this->taller->user_rut != auth()->user()->rut) {
            abort(403);
        }
    }

    public function render()
    {
        return view('livewire.organizador.solicitudes.modificar-solicitud');
    }
}
