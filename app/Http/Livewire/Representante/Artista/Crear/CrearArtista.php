<?php

namespace App\Http\Livewire\Representante\Artista\Crear;


use App\Models\Genero;
use App\Models\Estilo;
use App\Models\Artista;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearArtista extends Component
{

    use WithFileUploads;

    public $generos, $artista_id;
    public $nombre, $tipoArtista, $imagenArtista;
    public $estilos = [], $estilosSeleccionados = [];
    public $integrantes = [], $rutIntegrante, $nombreIntegrante, $apellidosIntegrante,
    $imagenIntegrante;
    public $albumes = [], $nombreAlbum, $imagenAlbum;

    protected $rules = [
        'nombre' => 'required|string|min:2|max:30',
        'imagenArtista' => 'required|image',
    ];

    protected $listeners = ['updatedEstilo'];

    public function mount()
    {
        $this->generos = Genero::all();
    }

    public function updatedEstilo(array $estilos)
    {
        $this->estilosSeleccionados = [];
        $this->estilos = $estilos;
        $this->dispatchBrowserEvent("generoSeleccionado");
    }

    public function updatedEstilosSeleccionados() {
        foreach($this->estilosSeleccionados as $index => $estiloSeleccionado) {
            if($this->estilosSeleccionados[$index] == false) {
                unset($this->estilosSeleccionados[$index]);
            }
        }
    }

    public function updatedImagenIntegrante() {
        $this->validate([
            'imagenIntegrante' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024',
        ]);
    }

    public function agregarIntegrante() {

        $this->validate([
            'rutIntegrante' => 'required|string|min:8|max:9',
            'nombreIntegrante' => 'required|string|min:2|max:30',
            'apellidosIntegrante' => 'required|string|min:2|max:40',
            'imagenIntegrante' => 'required|image',
        ]);

        $this->integrantes[] = [
            "rut" => $this->rutIntegrante,
            "artista_id" => null,
            "nombre" => $this->nombreIntegrante,
            'apellidos' => $this->apellidosIntegrante,
            "imagen" => $this->imagenIntegrante,
        ];

        $this->rutIntegrante = '';
        $this->nombreIntegrante = '';
        $this->imagenIntegrante = '';
        $this->apellidosIntegrante = '';

        $this->dispatchBrowserEvent("integranteAgregado");
    }

    public function eliminarIntegrante($index) {
        unset($this->integrantes[$index]);  
    }


    public function agregarArtista() {
        $this->validate();

        $imagen = $this->imagenArtista->store("representantes/".auth()->user()->rut."/artistas/".$this->nombre);

        $artista = Artista::create([
            'ART_Nombre' => $this->nombre,
            'biografia' => '',
            'tipo_artista' => $this->tipoArtista,
            'user_rut' => auth()->user()->rut,
            'imagen' => "storage/" . $imagen,
        ]);

        foreach($this->integrantes as $integrante) {
            $integrante["artista_id"] = $artista->id;
        }

        $artista->estilos()->sync($this->estilosSeleccionados);
    
    }

    public function eliminarImagenArtista() {
        $this->imagenArtista = '';
    }

    public function prueba() {
        $go = [
            $this->nombre,
            $this->tipoArtista,
            $this->integrantes,
            $this->imagenArtista,
            $this->estilosSeleccionados,
        ];
        $this->dispatchBrowserEvent("prueba", array("test" => $go));
    }


    public function render()
    {
        return view('livewire.representante.artista.crear.crear-artista');
    }
}
