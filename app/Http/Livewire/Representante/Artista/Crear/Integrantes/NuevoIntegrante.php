<?php

namespace App\Http\Livewire\Representante\Artista\Crear\Integrantes;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class NuevoIntegrante extends Component
{

    use WithFileUploads;

    public $integrantes = [], $rutIntegrante, $nombreIntegrante, 
    $apellidosIntegrante, $imagenIntegrante, $instrumentos = []; 
    
    public $nombreArtista;

    protected $listeners = [
        'updatedNombreArtista',
        'updatedInstrumentosSeleccionados',
    ];

    public function updatedNombreArtista($value) {
        $this->nombreArtista = $value;
    }

    public function updatedImagenIntegrante()
    {
        $this->validate([
            "imagenIntegrante" => 'image|mimes:jpeg,jpg,png,svg,gif',
        ]);
    }

    public function eliminarImagenIntegrante() {
        $this->imagenIntegrante = '';
    }

    public function updatedInstrumentosSeleccionados(array $seleccionados) {
        $this->instrumentos = $seleccionados;
    }

    public function agregarIntegrante()
    {
        $this->validate([
            'rutIntegrante' => 'required|string|min:8|max:9',
            'nombreIntegrante' => 'required|string|min:2|max:30',
            'apellidosIntegrante' => 'required|string|min:2|max:40',
            'imagenIntegrante' => 'required|image|mimes:jpeg,jpg,png,svg,gif',
        ]);

        $imagenIntegrante = $this->imagenIntegrante
        ->store("/representantes/" . auth()->user()->rut . "/artistas/" . $this->nombreArtista . 
        "/integrantes");

        $this->integrantes[] = [
            "rut" => $this->rutIntegrante,
            "artista_id" => null,
            "nombre" => $this->nombreIntegrante,
            'apellidos' => $this->apellidosIntegrante,
            "imagen" => $imagenIntegrante,
            'instrumentos' => $this->instrumentos,
        ];

        $this->rutIntegrante = '';
        $this->nombreIntegrante = '';
        $this->imagenIntegrante = '';
        $this->apellidosIntegrante = '';

        $this->emitTo('representante.artista.crear.crear-artista', 'updatedIntegrantes', $this->integrantes);
    }

    public function eliminarIntegrante($index)
    {
        Storage::delete($this->integrantes[$index]["imagen"]);
        unset($this->integrantes[$index]);
    }

    public function render()
    {
        return view('livewire.representante.artista.crear.integrantes.nuevo-integrante');
    }
}
