<?php

namespace App\Http\Livewire\Representante\Artista\Crear;


use App\Models\Genero;
use App\Models\Album;
use App\Models\Artista;
use App\Models\Integrante;
use App\Models\SolicitudArtista;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearArtista extends Component
{

    use WithFileUploads;

    public $nombreArtista, $imagenArtista, $tipoArtista, $instagram, $facebook, $twitter, $spotify, $youtube,
        $biografia, $caracteres_biografia = 0;
    public $generos, $generosSeleccionados = [], $integrantes = [];
    public $estilos = [], $estilosSeleccionados = [];
    public $albumes = [];

    protected $rules = [
        'nombreArtista' => 'required|string|min:2|max:30',
        'tipoArtista' => 'required',
        'imagenArtista' => 'required|image',
        'biografia' => 'required|string|min:20|max:2000',
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
        'updatedGenerosSeleccionados',
        'updatedIntegrantes',
        'agregarArtista',
    ];

    /**
     * Al cargarse este componente
     * se seleccionan todos los generos
     * musicales
     */
    public function mount()
    {
        $this->generos = Genero::all();
    }

    /**
     * Cada vez que el usuario actualiza
     * el campo de biografia del artista
     * se comparan la cantidad de caracteres que ha
     * escrito versus el maximo permitido de 2000
     */
    public function updatedBiografia()
    {
        $this->caracteres_biografia = strlen($this->biografia);
    }

    /**
     * Cada vez que el usuario actualiza el nombre
     * del artista se envia el nuevo nombre
     * a album y nuevo integrante
     * para la actualizacion del directorio
     */
    public function updatedNombreArtista($value)
    {
        $this->emitTo("representante.artista.crear.album.album", 'updatedNombreArtista', $value);
        $this->emitTo("representante.artista.crear.nuevo-integrante", 'updatedNombreArtista', $value);
        $this->dispatchBrowserEvent("onContentChanged");
    }

    /**
     * Selecciona los estilos musicales
     * que estan asociados a los generos
     * que ha sido seleccionados, cada vez
     * que se actualiza esta seleccion
     * se vuelven a cargar los estilos asociados
     */
    public function updatedGenerosSeleccionados()
    {
        $this->estilos = [];
        $this->generos = Genero::whereIn("id", $this->generosSeleccionados)->get();
        foreach ($this->generos as $genero) {
            foreach ($genero->estilos as $estilo) {
                $this->estilos[] = $estilo;
            }
        }
    }

    /**
     * Cada vez que se deselecciona
     * un estilo se debe eliminar ya que
     * su valor por defecto pasa a false
     */
    public function updatedEstilosSeleccionados()
    {
        foreach ($this->estilosSeleccionados as $index => $estiloSeleccionado) {
            if ($this->estilosSeleccionados[$index] == false) {
                unset($this->estilosSeleccionados[$index]);
            }
        }
    }

    /**
     * Esta function es emitida desde el componente
     * Album cada vez que se agrega o elimina
     * un album
     */
    public function updatedAlbumes(array $albumes)
    {
        $this->albumes = $albumes;
    }


    /**
     * Esta function es emitiada desde el
     * componente NuevoIntegrantes cada vez
     * que se agrega o elimina
     * un integrante
     */
    public function updatedIntegrantes(array $integrantes)
    {
        $this->integrantes = $integrantes;
    }

    /**
     * Se valida si el representante ha completado
     * los campos minimos obligatorios, si es asi
     * se limpiam las url y se emite una alerta 
     * para confirmar su accion
     */
    public function validarAgregarArtista()
    {
        $this->validate();
        if ($this->tipoArtista == 2) {
            $this->validate([
                'integrantes' => 'required|array|min:1',
            ]);
        }
        $this->limpiarURL();
        $this->dispatchBrowserEvent('solicitudAgregarArtista');
    }

    /**
     * Almacena la imagen del artista, crea
     * el registro del artista en estado
     * inactivo (0) y su respectiva
     * solicitud en estado pendiente (0),
     * luego en caso de que el artista
     * sea una banda se asocian sus integrantes
     * , para ambos artistas se asocian los albumes
     * y los respectivos estilos seleccionados
     */
    public function agregarArtista()
    {
        $imagen = $this->imagenArtista->store("representantes/" . auth()->user()->rut . "/artistas/" . $this->nombreArtista, "azure");

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
            'estado' => 0,
        ]);


        foreach ($this->integrantes as $integrante) {
            $integrante["artista_id"] = $artista->id;
            $instrumentos = array_pop($integrante);
            $nuevoIntegrante = Integrante::create($integrante);
            $nuevoIntegrante->instrumentos()->syncWithoutDetaching($instrumentos);
        }

        foreach ($this->albumes as $album) {
            $album["artista_id"] = $artista->id;
            $imagen = $album["imagen"];
            $imagen->store("representante/" . auth()->user()->rut . "/artistas/" . $artista->ART_Nombre . "/albums", "azure");
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

    /**
     * Elimina la vista previa de la imagen
     * del artista
     */
    public function eliminarImagenArtista()
    {
        $this->imagenArtista = '';
    }

    /**
     * Verifica que las URL cumplan
     * un cuerpo preestablecido
     */
    public function limpiarURL()
    {
        $this->validate([
            "instagram" => "nullable|regex:/https:\/\/www.instagram.com/",
            "facebook" => "nullable|regex:/https:\/\/www.facebook.com/",
            "twitter" => "nullable|regex:/twitter.com/",
            "spotify" => "nullable|regex:/https:\/\/open.spotify.com\/artist/",
        ]);

        $this->instagram = preg_replace('/https:\/\/www.instagram.com/', '', $this->instagram);
        $this->facebook = preg_replace('/https:\/\/www.facebook.com/', '',  $this->facebook);
        $this->twitter = preg_replace('/https:\/\/twitter.com/', '',  $this->twitter);
        $this->spotify = preg_replace('/https:\/\/open.spotify.com\/artist\//', '',  $this->spotify);
    }

    public function render()
    {
        return view('livewire.representante.artista.crear.crear-artista');
    }
}
