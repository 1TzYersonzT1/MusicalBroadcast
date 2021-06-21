<?php

namespace App\Http\Livewire\Representante\Artista\Crear;


use App\Models\Genero;
use App\Models\Estilo;
use App\Models\Artista;
use App\Models\SolicitudArtista;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearArtista extends Component
{

    use WithFileUploads;

    public $nombreArtista, $imagenArtista, $tipoArtista, $instagram, $facebook, $twitter;
    public $generos, $integrantes;
    public $estilos = [], $estilosSeleccionados = [];

    public $albumes = [], $nombreAlbum, $imagenAlbum;

    protected $rules = [
        'nombreArtista' => 'required|string|min:2|max:30',
        'tipoArtista' => 'required',
        'imagenArtista' => 'required|image',
    ];

    protected $messages = [
        'instagram.regex' => 'La URL ingresada no corresponde al sitio web de instagram.',
        'facebook.regex' => 'La URL ingresada no corresponde al sitio web de facebook.',
        'twitter.regex' => 'La URL ingresada no corresponde al sitio web de twitter.',
    ];

    protected $listeners = [
        'updatedEstilo',
        'updatedIntegrantes',
        'agregarArtista',
    ];

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

    public function updatedEstilosSeleccionados()
    {
        foreach ($this->estilosSeleccionados as $index => $estiloSeleccionado) {
            if ($this->estilosSeleccionados[$index] == false) {
                unset($this->estilosSeleccionados[$index]);
            }
        }
    }

    public function updatedIntegrantes(array $integrantes)
    {
        $this->integrantes = $integrantes;
    }

    public function validarAgregarArtista()
    {
        $this->validate();
        $this->limpiarURL();
        $this->dispatchBrowserEvent('solicitudAgregarArtista');
    }


    public function agregarArtista()
    {
        $imagen = $this->imagenArtista->store("representantes/" . auth()->user()->rut . "/artistas/" . $this->nombreArtista);

        $artista = Artista::create([
            'ART_Nombre' => $this->nombreArtista,
            'biografia' => '',
            'tipo_artista' => $this->tipoArtista,
            'user_rut' => auth()->user()->rut,
            'imagen' => "storage/" . $imagen,
            'estado' => 0,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
        ]);

        $solicitud = SolicitudArtista::create([
            'artista_id' => $artista->id,
            'observacion' => '',
            'estado' => 1,
        ]);

        foreach ($this->integrantes as $integrante) {
            $integrante["artista_id"] = $artista->id;
        }

        $artista->estilos()->sync($this->estilosSeleccionados);
        $artista->integrantes()->createMany($this->integrantes);
    }

    public function eliminarImagenArtista()
    {
        $this->imagenArtista = '';
    }

    public function prueba()
    {
        $go = [
            $this->nombreArtista,
            $this->tipoArtista,
            $this->integrantes,
            $this->imagenArtista,
            $this->estilosSeleccionados,
        ];
        $this->dispatchBrowserEvent("prueba", array("test" => $go));
    }

    public function limpiarURL()
    {
        $this->validate([
            "instagram" => "nullable|regex:/https:\/\/www.instagram.com/",
            "facebook" => "nullable|regex:/https:\/\/www.facebook.com/",
            "twitter" => "nullable|regex:/twitter.com/",
        ]);

        $this->instagram = preg_replace('/https:\/\/www.instagram.com/', '', $this->instagram);
        $this->facebook = preg_replace('/https:\/\/www.facebook.com/', '',  $this->facebook);
        $this->twitter = preg_replace('/https:\/\/twitter.com/', '',  $this->twitter);
    }

    public function render()
    {
        return view('livewire.representante.artista.crear.crear-artista');
    }
}
