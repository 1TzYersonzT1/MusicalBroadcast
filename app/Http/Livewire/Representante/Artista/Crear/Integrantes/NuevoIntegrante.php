<?php

namespace App\Http\Livewire\Representante\Artista\Crear\Integrantes;

use App\Models\Instrumento;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class NuevoIntegrante extends Component
{

    use WithFileUploads;

    public $integrantes = [], $rutIntegrante, $nombreIntegrante, 
    $apellidosIntegrante, $imagenIntegrante, $instrumentos = [], $instrumentosSeleccionados = []; 
    
    public $nombreArtista;

    protected $listeners = [
        'updatedNombreArtista',
    ];

    protected $messages = [
        'instrumentosSeleccionados.required' => 'Debe seleccionar uno o más instrumentos.',
    ];

    public function mount() {
        $this->instrumentos = Instrumento::all();
    }

    public function updated() {
        foreach($this->instrumentosSeleccionados as $index => $instrumentoSeleccionado) {
            if($this->instrumentosSeleccionados[$index] == false) {
                unset($this->instrumentosSeleccionados[$index]);
            }
        }
    }

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

    public function agregarIntegrante()
    {
        $this->validate([
            'rutIntegrante' => 'required|string|min:8|max:9|unique:integrante,rut',
            'nombreIntegrante' => 'required|string|min:2|max:30',
            'apellidosIntegrante' => 'required|string|min:2|max:40',
            'imagenIntegrante' => 'required|image|mimes:jpeg,jpg,png,svg,gif',
            'instrumentosSeleccionados' => 'required|array|min:1',
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
            'instrumentos' => $this->instrumentosSeleccionados,
        ];

        $this->rutIntegrante = '';
        $this->nombreIntegrante = '';
        $this->imagenIntegrante = '';
        $this->apellidosIntegrante = '';

        $this->instrumentosSeleccionados = []; 

        $this->emit('updatedIntegrantes', $this->integrantes);
    }

    public function eliminarIntegrante($index)
    {
        Storage::delete($this->integrantes[$index]["imagen"]);
        unset($this->integrantes[$index]);
        $this->emit('updatedIntegrantes', $this->integrantes);
    }

    public function render()
    {
        return view('livewire.representante.artista.crear.integrantes.nuevo-integrante');
    }
}
