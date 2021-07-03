<?php

namespace App\Http\Livewire\Representante\Artista\Modificar\Album;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class Album extends Component
{

    use WithFileUploads;

    public $artista;
    public $albumes = [], $nombreAlbum, $fechaLanz, $imagenAlbum;
    public $canciones = [], $nombreCancion;
    public $albumSeleccionado;

    protected $listeners = [
        'eliminarAlbumConfirmado',
    ];

    protected $rules = [
        'nombreAlbum' => 'required|string|min:2|max:45',
        'fechaLanz' => 'required',
        'imagenAlbum' => 'required|image',
        'canciones' => 'required|array|min:1',
    ];


    public function mount() {
        $this->albumes = $this->artista->albumes;
    }

    public function agregarAlbum()
    {
        $this->validate();

        $imagen = $this->imagenAlbum->store("representantes/" . auth()->user()->rut . "/artistas/" . $this->artista->ART_Nombre . "/albums", "azure");

        $album = \App\Models\Album::create([
            "ALB_Nombre" => $this->nombreAlbum,
            "artista_id" => $this->artista->id,
            "ALB_FechaLanzamiento" => Carbon::parse($this->fechaLanz)->isoFormat("Y-M-D"),
            "ALB_CantCanciones" => count($this->canciones),
            "imagen" => $imagen,
        ]);

        $this->albumes[] =  $album;

        $album->canciones()->createMany($this->canciones);

        $this->nombreAlbum = '';
        $this->fechaLanz = '';
        $this->imagenAlbum = '';
        $this->canciones = [];
    }


    public function validarEliminarAlbum($album)
    {
        $this->albumSeleccionado = \App\Models\Album::find($album);
        $this->dispatchBrowserEvent("validarEliminarAlbum");
    }

    public function eliminarAlbumConfirmado()
    {
        $disk = Storage::disk("azure");
        $disk->delete($this->albumSeleccionado->imagen);
        $album = \App\Models\Album::find($this->albumSeleccionado->id);

        $album->canciones()->delete();  
        $album->delete();

        $this->artista->refresh();
        
        $this->albumes = $this->artista->albumes;
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
        return view('livewire.representante.artista.modificar.album.album');
    }
}
