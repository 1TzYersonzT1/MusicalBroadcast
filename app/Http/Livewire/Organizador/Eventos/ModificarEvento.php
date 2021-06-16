<?php

namespace App\Http\Livewire\Organizador\Eventos;

use Livewire\Component;
use App\Models\Evento;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ModificarEvento extends Component
{

    use WithFileUploads;

    public $evento, $nuevaImagen, $caracteres_descripcion = 0;

    protected $rules = [
        "evento.EVE_Nombre" => 'required|string|max:30',
        'evento.EVE_Descripcion' => 'required|string|min:10|max:255',
        "evento.EVE_Fecha" => 'required',
        "evento.EVE_Hora" => 'required',
        "evento.EVE_Lugar" => 'required|string|max:40',
    ];

    protected $listeners = ["modificarEventoConfirmado"];

    public function mount($id)
    {
        $this->evento = Evento::find($id);
        $this->caracteres_descripcion = strlen($this->evento->EVE_Descripcion);
    }

    public function updatedNuevaImagen()
    {
        $this->validate([
            "nuevaImagen" => 'image|mimes:jpeg,jpg,png,gif,svg|max:1024',
        ]);
    }

    public function updatedEventoEVEDescripcion()
    {
        $this->caracteres_descripcion = strlen($this->evento->EVE_Descripcion);
    }

    public function modificarEvento()
    {
        $this->validate();
        $this->dispatchBrowserEvent("confirmarModificarEvento");
    }

    public function modificarEventoConfirmado()
    {
    
        $evento = Evento::find($this->evento->id);
        $evento = $this->evento;

        if ($this->nuevaImagen) {
            Storage::delete($evento->imagen);
            $nuevaImagen = $this->nuevaImagen->store("/eventos/organizador/" . auth()->user()->rut);
            $evento->imagen = "storage/" . $nuevaImagen;
        }

        $evento->solicitudes[0]->estado = 4;
        $evento->solicitudes[0]->save();
        $evento->save();

        $this->dispatchBrowserEvent("eventoModificado");
    }

    public function render()
    {
        return view('livewire.organizador.eventos.modificar-evento');
    }
}
