<?php

namespace App\Http\Livewire\Representante\Artista\Crear\Integrantes;

use App\Models\Instrumento;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class NuevoIntegrante extends Component
{

    /**Trait utilizado para la subida de archivos */
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

    /**
     * Al cargarse este componente
     * se seleccionan todos los
     * instrumentos musicales
     */
    public function mount()
    {
        $this->instrumentos = Instrumento::all();
    }

    /**
     * Cada vez que el usuario deselecciona un
     * instrumento musical su valor pasa a false,
     * por lo que debe eliminarse del arreglo
     * para su posterior utilizacion
     */
    public function updated()
    {
        foreach ($this->instrumentosSeleccionados as $index => $instrumentoSeleccionado) {
            if ($this->instrumentosSeleccionados[$index] == false) {
                unset($this->instrumentosSeleccionados[$index]);
            }
        }
    }

    /**
     * Cada vez que se inserta un nuevo archivo
     * en el campo de imagen integrante se valida
     * que este sea solo de tipo imagen y
     * con un maximo de 1024kb
     */
    public function updatedImagenIntegrante()
    {
        $this->validate([
            "imagenIntegrante" => 'image|mimes:jpeg,jpg,png,svg,gif|max:1024',
        ]);
    }

    /**
     * Elimina la vista previa de la imagen
     * del integrante habilitando
     * el campo para insertar otra.
     */
    public function eliminarImagenIntegrante()
    {
        $this->imagenIntegrante = '';
    }


    /**
     * Verifica que todos los campos hayan sido ingresados
     * , si es asi agrega al nuevo integrante al arreglo
     * de integrantes junto a los instrumentos que ha
     * seleccionado, luego se limpian los campos para
     * una nueva insercion y se emite una function
     * al componente padre ya sea agregar o modificar artista con
     * el nuevo arreglo de integrantes 
     */
    public function agregarIntegrante()
    {
        $this->validate([
            'rutIntegrante' => 'required|string|min:8|max:9|unique:integrante,rut',
            'nombreIntegrante' => 'required|string|min:2|max:30',
            'apellidosIntegrante' => 'required|string|min:2|max:40',
            'imagenIntegrante' => 'required|image|mimes:jpeg,jpg,png,svg,gif',
            'instrumentosSeleccionados' => 'required|array|min:1',
        ]);

        $imagen = $this->imagenIntegrante->store("representantes/" . auth()->user()->rut . "/artistas/" . $this->nombreArtista . "/integrantes", "azure");

        $this->integrantes[] = [
            "rut" => $this->rutIntegrante,
            "artista_id" => null,
            "nombre" => $this->nombreIntegrante,
            'apellidos' => $this->apellidosIntegrante,
            "imagen" => $imagen,
            'instrumentos' => $this->instrumentosSeleccionados,
        ];

        $this->rutIntegrante = '';
        $this->nombreIntegrante = '';
        $this->imagenIntegrante = '';
        $this->apellidosIntegrante = '';

        $this->instrumentosSeleccionados = [];

        $this->emit('updatedIntegrantes', $this->integrantes);
    }

    /**
     * Permite eliminar del arreglo de integrantes
     * al integrante seleccionado.
     */
    public function eliminarIntegrante($index)
    {
        $disk = Storage::disk("azure");
        $disk->delete($this->integrantes[$index]["imagen"]);
        unset($this->integrantes[$index]);
        $this->emit('updatedIntegrantes', $this->integrantes);
    }

    public function render()
    {
        return view('livewire.representante.artista.crear.integrantes.nuevo-integrante');
    }
}
