<?php

namespace App\Http\Livewire\Taller;

use Gate;
use Livewire\Component;
use App\Models\Taller;
use Auth;
use Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;

class CrearTaller extends Component
{

    public $titulo, $descripcion, $aforo, $fecha, $tiempo, $lugar, $user_rut;
    public $protocolos, $requisitos;


    protected $rules = [
        'descripcion' => ['required', 'string', 'max:255']
    ];

    protected $listeners = ["updatedRequisitos", 'updatedProtocolos'];

    public function mount()
    {
        $this->titulo = "";
        $this->fecha = Carbon::now()->isoFormat("LL");
        $this->protocolos = [];
        $this->requisitos = [];
    }

    public function updatedFecha()
    {
        $this->fecha = Carbon::parse($this->fecha)->isoFormat("LL");
    }

    public function updatedRequisitos($value)
    {
        $this->requisitos = $value['requisitos'];
    }

    public function updatedProtocolos($value)
    {
        $this->protocolos = $value['protocolos'];
    }

    public function nuevoTaller()
    {
        $this->validate();

        $taller = Taller::create([
            'TAL_Nombre' => $this->titulo,
            'TAL_Descripcion' => $this->descripcion,
            'TAL_Requisitos' => implode(", ", $this->requisitos),
            'TAL_Protocolo' => implode(", ", $this->protocolos),
            'TAL_Aforo' => $this->aforo,
            'TAL_Horario' => Carbon::parse(strtotime($this->fecha))->isoFormat("Y-M-D") . " " . $this->tiempo,
            'TAL_Lugar' => $this->lugar,
            'user_rut' => Auth::user()->rut,
        ]);

        return redirect()->route("talleres.index");
    }


    public function render()
    {
        if (Gate::denies('organizar')) {
            abort(403);
        }
        return view('livewire.taller.crear-taller');
    }
}
