<?php

namespace App\Http\Livewire\Taller;

use Gate;
use Livewire\Component;
use App\Models\Taller;
use App\Models\SolicitudTaller;
use Auth;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class CrearTaller extends Component
{

    use WithFileUploads;

    public $titulo, $descripcion, $aforo, $hora, $lugar, $user_rut, $fecha;
    public $caracteres_descripcion = 0;
    public $protocolos = [], $requisitos = [];

    protected $rules = [
        'titulo' => ['required', 'string', 'max:30'],
        'hora' => ['required', 'date_format:H:i'],
        'aforo' => ['required', 'integer'],
        'lugar' => ['required', 'string', 'max:55'],
        'descripcion' => ['required', 'string', 'max:255'],
    ];

    protected $listeners = ["updatedRequisitos", 'updatedProtocolos'];

    public function updatedFecha()
    {
        $this->fecha = Carbon::parse($this->fecha)->isoFormat("LL");
    }

    public function updatedDescripcion() {
        $this->caracteres_descripcion = strlen($this->descripcion);
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
            'TAL_Horario' => Carbon::parse(strtotime("2021-06-29"))->isoFormat("Y-M-D") . " " . $this->hora,
            'TAL_Lugar' => $this->lugar,
            'estado' => 0,
            'user_rut' => Auth::user()->rut,
        ]);

        $solicitud = SolicitudTaller::create([
            'observacion' => '',
            'estado' => 0,
            'taller_id' => $taller->id,
        ]);

        $this->dispatchBrowserEvent("nuevoTaller");
    }


    public function render()
    {
        if (Gate::denies('organizar')) {
            abort(403);
        }
     
        return view('livewire.taller.crear-taller');
    }
}
