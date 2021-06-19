<?php

namespace App\Http\Livewire\Organizador\Eventos\Crear;

use Livewire\Component;
use App\Models\Evento;
use App\Models\SolicitudEvento;
use Livewire\WithFileUploads;


class CrearEvento extends Component
{

    use WithFileUploads;

    public $nombre, $fecha, $hora, $lugar, $descripcion, $imagen, $caracteres_descripcion = 0;

    protected $rules = [
        "nombre" => 'required|string|max:30',
        'fecha' => 'required',
        'hora' => 'required',
        'lugar' => 'required|string|max:40',
        'descripcion' => 'required|string|min:10|max:255',
        'imagen' => 'required|image|mimes:jpeg,jpg,png,svg,gif|max:1024',
    ];

    public function updatedDescripcion() {
        $this->caracteres_descripcion = strlen($this->descripcion);
    }

    public function updatedImagen() {
        $this->validate([
            'imagen' => 'required|image|mimes:jpeg,jpg,png,svg,gif|max:1024'
        ]);
    }

    public function nuevoEvento() {

        $this->validate();

        $imagen = $this->imagen->store("/eventos/organizador/".auth()->user()->rut);

        $evento = Evento::create([
            'user_rut' => auth()->user()->rut,
            'EVE_Nombre' => $this->nombre,
            'EVE_Descripcion' => $this->descripcion,
            'EVE_Lugar' => $this->lugar,
            'EVE_Fecha' => $this->fecha,
            'EVE_Hora' => $this->hora,
            'imagen' => 'storage/' . $imagen,
            'estado' => 0,
        ]);

        $solicitud = SolicitudEvento::create([
            'observacion' => '',
            'estado' => 0,
            'evento_id' => $evento->id,
        ]);

        $this->dispatchBrowserEvent("nuevoEvento");
    }

    public function render()
    {
        return view('livewire.organizador.eventos.crear.crear-evento');
    }
}
