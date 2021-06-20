<?php

namespace App\Http\Livewire\Organizador\Talleres\Crear;

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

    public $titulo, $descripcion, $aforo, $hora, $lugar, $user_rut, $fecha, $imagen;
    public $caracteres_descripcion = 0;
    public $protocolos = [], $requisitos = [];

    protected $rules = [
        'titulo' => ['required', 'string', 'max:30'],
        'hora' => ['required', 'date_format:H:i'],
        'aforo' => ['required', 'integer'],
        'lugar' => ['required', 'string', 'max:55'],
        'descripcion' => ['required', 'string', 'max:255'],
        'imagen' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024',
    ];

    protected $listeners = ["updatedRequisitos", 'updatedProtocolos'];

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

    public function updatedImagen() {
        $this->validate([
            'imagen' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024',
        ]);
    }

    public function eliminarImagen() {
        $this->imagen = '';
    }

    public function nuevoTaller()
    {
        $this->validate();

        $imagen = $this->imagen->store("/talleres/organizador/".auth()->user()->rut);

        $taller = Taller::create([
            'TAL_Nombre' => $this->titulo,
            'TAL_Descripcion' => $this->descripcion,
            'TAL_Requisitos' => implode(", ", $this->requisitos),
            'TAL_Protocolo' => implode(", ", $this->protocolos),
            'TAL_Aforo' => $this->aforo,
            'TAL_Fecha' => Carbon::parse(date_create($this->fecha))->isoFormat("Y-M-D"),
            'TAL_Hora' =>  $this->hora,
            'TAL_Lugar' => $this->lugar,
            'estado' => 0,
            'user_rut' => Auth::user()->rut,
            'imagen' => "storage/" . $imagen,
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
     
        return view('livewire.organizador.talleres.crear.crear-taller');
    }
}
