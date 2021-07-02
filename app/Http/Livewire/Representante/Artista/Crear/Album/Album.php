<?php

namespace App\Http\Livewire\Representante\Artista\Crear\Album;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Album extends Component
{

    /**
     * Trait necesario para la subida de archivos
     */
    use WithFileUploads;

    public $albumes = [], $nombreAlbum, $imagenAlbum, $fechaLanz;
    public $nombreArtista;
    public $canciones = [], $nombreCancion;

    protected $rules = [
        'nombreAlbum' => 'required|string|min:2|max:45',
        'fechaLanz' => 'required',
        'imagenAlbum' => 'required|image',
        'canciones' => 'required|array|min:1',
    ];

    protected $listeners = [
        'eliminarAlbum',
        'updatedNombreArtista',
    ];

    protected $messages = [
        'canciones.required' => 'El album debe contener al menos 1 canción',
    ];

    public function updatedNombreArtista($value)
    {
        $this->nombreArtista = $value;
    }

    public function agregarAlbum()
    {
        $this->validate();

        $imagen = $this->imagenAlbum->store("representantes/" . auth()->user()->rut . "/artistas/" . $this->nombreArtista . "/albums", "azure");

        $this->albumes[] = [
            "ALB_Nombre" => $this->nombreAlbum,
            "artista_id" => null,
            "ALB_FechaLanzamiento" => Carbon::parse($this->fechaLanz)->isoFormat("Y-M-D"),
            "ALB_CantCanciones" => count($this->canciones),
            "imagen" => $imagen,
            "canciones" => $this->canciones,
        ];

        $this->emitTo("representante.artista.crear.crear-artista", "updatedAlbumes", $this->albumes);

        $this->nombreAlbum = '';
        $this->fechaLanz = '';
        $this->imagenAlbum = '';
        $this->canciones = [];
    }

    public function eliminarAlbum($seleccionado)
    {
        $disk = Storage::disk("azure");
        $disk->delete($this->albumes[$seleccionado]["imagen"]);
        unset($this->albumes[$seleccionado]);
        $this->emitTo("representante.artista.crear.crear-artista", "updatedAlbumes", $this->albumes);
    }


    /**
     * Cada vez que se selecciona un nuevo archivo
     * para subir en el input imagen album
     * se valida que este sea solo de tipo imagen
     * con un maximo de 1024kb
     */
    public function updatedImagenAlbum()
    {
        $this->validate([
            'imagenAlbum' => 'image|mimes:jpeg,jpg,png,svg,gif|max:1024',
        ]);
    }

    /**
     * Elimina la vista previa de la imagen
     * del album en el formulario de agregar
     * nuevo album
     */
    public function eliminarImagenAlbum()
    {
        $this->imagenAlbum = '';
    }

    /**
     * Permite introducir la nueva cancion
     * al listado de canciones del album
     * en especifico que se intenta crear
     */
    public function nuevaCancion()
    {
        if ($this->nombreCancion != '') {
            $this->canciones[] = [
                'album_id' => null,
                'CAN_Nombre' => $this->nombreCancion,
            ];
            $this->nombreCancion = '';
        }
    }

    /**
     * Es utilizado para eliminar una cancion
     * del listado en el formulario
     * agregar nuevo album
     */
    public function eliminarCancion($seleccionado)
    {
        unset($this->canciones[$seleccionado]);
    }

    public function render()
    {
        return view('livewire.representante.artista.crear.album.album');
    }
}
