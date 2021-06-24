<?php

namespace App\Http\Livewire\Representante\Artista\Crear;


use App\Models\Genero;
use App\Models\Estilo;
use App\Models\Album;
use App\Models\Artista;
use App\Models\Integrante;
use App\Models\SolicitudArtista;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearArtista extends Component
{

    use WithFileUploads;

    public $nombreArtista, $imagenArtista, $tipoArtista, $instagram, $facebook, $twitter, $spotify, $youtube, $biografia, $caracteres_biografia = 0;
    public $generos, $integrantes = [];
    public $estilos = [], $estilosSeleccionados = [];
    public $albumes = [];
    
    protected $rules = [
        'nombreArtista' => 'required|string|min:2|max:30',
        'tipoArtista' => 'required',
        'imagenArtista' => 'required|image',
        'estilosSeleccionados' => 'required',
    ];

    protected $messages = [
        'estilosSeleccionados.required' => 'Debe seleccionar al menos un estilo que represente al artista.',
        'instagram.regex' => 'La URL ingresada no corresponde al sitio web de instagram.',
        'facebook.regex' => 'La URL ingresada no corresponde al sitio web de facebook.',
        'twitter.regex' => 'La URL ingresada no corresponde al sitio web de twitter.',
        'spotify.regex' => 'La URL ingresada no corresponde a la cuenta de spotify del artista.',
        'youtube.regex' => 'La URL ingresada no corresponde al canal de youtube del artista.',
    ];

    protected $listeners = [
        'updatedEstilo',
        'updatedAlbumes',
        'updatedIntegrantes',
        'agregarArtista',
    ];

    public function mount()
    {
        $this->generos = Genero::all();
    }

    public function updatedBiografia() {
        $this->caracteres_biografia = strlen($this->biografia);
    }

    public function updatedNombreArtista($value)
    {
        $this->emitTo("representante.artista.crear.album.album", 'updatedNombreArtista', $value);
        $this->emitTo("representante.artista.crear.nuevo-integrante", 'updatedNombreArtista', $value);
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

    public function updatedAlbumes(array $albumes)
    {
        $this->albumes = $albumes;
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
            'biografia' => $this->biografia,
            'tipo_artista' => $this->tipoArtista,
            'user_rut' => auth()->user()->rut,
            'imagen' => "storage/" . $imagen,
            'estado' => 0,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'spotify' => $this->spotify,
            'youtube' => $this->youtube,
        ]);

        $solicitud = SolicitudArtista::create([
            'artista_id' => $artista->id,
            'observacion' => '',
            'estado' => 1,
        ]);


        foreach ($this->integrantes as $integrante) {
            $integrante["artista_id"] = $artista->id;
            $instrumentos = array_pop($integrante);
            $nuevoIntegrante = Integrante::create($integrante);
            $nuevoIntegrante->instrumentos()->syncWithoutDetaching($instrumentos);
        }

        foreach ($this->albumes as $album) {
            $album["artista_id"] = $artista->id;
            $canciones = array_pop($album);
            $nuevoAlbum = Album::create($album);
            foreach ($canciones as $cancion) {
                $cancion["album_id"] = $nuevoAlbum->id;
            }
            $nuevoAlbum->canciones()->createMany($canciones);
        }


        $artista->estilos()->sync($this->estilosSeleccionados);

        $this->estilosSeleccionados = [];
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
            "spotify" => "nullable|regex:/https:\/\/open.spotify.com\/artist/",
            "youtube" => "nullable|regex:/https:\/\/www.youtube.com\/channel/",
        ]);

        $this->instagram = preg_replace('/https:\/\/www.instagram.com/', '', $this->instagram);
        $this->facebook = preg_replace('/https:\/\/www.facebook.com/', '',  $this->facebook);
        $this->twitter = preg_replace('/https:\/\/twitter.com/', '',  $this->twitter);
        $this->spotify = preg_replace('/https:\/\/open.spotify.com\/artist\//', '',  $this->spotify);
        $this->youtube = preg_replace('/https:\/\/www.youtube.com\/channel\//', '',  $this->youtube);
    }

    public function render()
    {
        return view('livewire.representante.artista.crear.crear-artista');
    }
}
