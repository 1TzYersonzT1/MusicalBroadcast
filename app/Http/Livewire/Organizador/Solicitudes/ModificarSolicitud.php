<?php

namespace App\Http\Livewire\Organizador\Solicitudes;

use Livewire\Component;
use App\Models\Taller;
use Auth;

class ModificarSolicitud extends Component
{

    public $taller, $caracteres_descripcion = 0;
    public $requisitos = [], $protocolos = [];

    protected $listeners = ["updatedRequisitos", "updatedProtocolos"];

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
        $this->requisitos = $this->taller->TAL_Requisitos;
        $this->protocolos = $this->taller->TAL_Protocolo;
        $this->caracteres_descripcion = strlen($this->taller->TAL_Descripcion);
        if($this->taller->user_rut != auth()->user()->rut) {
            abort(403);
        }
    }

    public function updatedTallerTalDescripcion() {
        $this->caracteres_descripcion = strlen($this->taller->TAL_Descripcion);
    }

    public function updatedRequisitos($value) {
        $this->requisitos = $value["requisitos"];
    }

    public function updatedProtocolos($value) {
        $this->protocolos = $value["protocolos"];
    }

    public function modificarTaller() {
        $taller = Taller::find($this->taller->id);
        $taller = $this->taller;
        $taller->TAL_Requisitos = implode(", ", $this->requisitos);
        $taller->TAL_Protocolo = implode(", ", $this->protocolos);
        $taller->solicitudes[0]->estado = 4;
        $taller->solicitudes[0]->save();
        $taller->save();

        return redirect()->route("organizador.mis-solicitudes");
    }

    public function render()
    {
        return view('livewire.organizador.solicitudes.modificar-solicitud');
    }
}
