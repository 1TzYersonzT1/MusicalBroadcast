<?php

namespace App\Http\Livewire\Representante\Artista\Crear\Album;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Album extends Component
{
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
        $this->albumes = [];
    }

    public function agregarAlbum()
    {
        $this->validate();

        $imagenAlbum = $this->imagenAlbum
            ->store("/representantes/" . auth()->user()->rut . "/artistas/" . $this->nombreArtista .
                "/albumes/" . $this->nombreAlbum . "/");

        $this->albumes[] = [
            "ALB_Nombre" => $this->nombreAlbum,
            "artista_id" => null,
            "ALB_FechaLanzamiento" => Carbon::parse($this->fechaLanz)->isoFormat("Y-M-D"),
            "ALB_CantCanciones" => count($this->canciones),
            "imagen" => $imagenAlbum,
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
        Storage::delete($this->albumes[$seleccionado]["imagen"]);
        unset($this->albumes[$seleccionado]);
        $this->emitTo("representante.artista.crear.crear-artista", "updatedAlbumes", $this->albumes);
    }


    public function updatedImagenAlbum()
    {
        $this->validate([
            'imagenAlbum' => 'image|mimes:jpeg,jpg,png,svg,gif',
        ]);
    }

    public function eliminarImagenAlbum()
    {
        $this->imagenAlbum = '';
    }

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

    public function eliminarCancion($seleccionado)
    {
        unset($this->canciones[$seleccionado]);
    }

    public function render()
    {
        return view('livewire.representante.artista.crear.album.album');
    }
}
