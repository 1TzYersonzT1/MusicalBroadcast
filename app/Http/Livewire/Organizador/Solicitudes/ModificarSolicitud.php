<?php

namespace App\Http\Livewire\Organizador\Solicitudes;

use Livewire\Component;
use App\Models\Taller;
use Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ModificarSolicitud extends Component
{

    use WithFileUploads;

    public $taller, $caracteres_descripcion = 0, $nuevaImagen;
    public $requisitos = [], $protocolos = [];

    protected $listeners = [
        "updatedRequisitos", 
        "updatedProtocolos",
        "modificarTallerConfirmado",
    ];

    protected $rules = [
        "taller.TAL_Nombre" => 'required|string',
        'taller.TAL_Fecha' => 'required',
        'taller.TAL_Hora' => 'required',
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

    public function updatedNuevaImagen() {
        $this->validate([
            'nuevaImagen' => 'image|mimes:jpeg,png,svg,jpg,gif|max:1024',
        ]);
    }

    public function modificarTaller() {
        $this->dispatchBrowserEvent("confirmarModificarTaller");
    }

    public function modificarTallerConfirmado() {

        $this->validate();

        $taller = Taller::find($this->taller->id);
        $taller = $this->taller;
        $taller->TAL_Requisitos = implode(", ", $this->requisitos);
        $taller->TAL_Protocolo = implode(", ", $this->protocolos);
        $taller->solicitudes[0]->estado = 4;
        $taller->solicitudes[0]->save();

        if($this->nuevaImagen != null) {
            Storage::delete($taller->imagen);
            $nuevaImagen = $this->nuevaImagen->store("/talleres/organizador/".auth()->user()->rut);
            $taller->imagen = "storage/" . $nuevaImagen;
        }
        
        $taller->save();
    }

    public function render()
    {
        return view('livewire.organizador.solicitudes.modificar-solicitud');
    }
}
