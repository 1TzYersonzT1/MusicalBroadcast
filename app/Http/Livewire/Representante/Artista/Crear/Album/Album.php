<?php

namespace App\Http\Livewire\Representante\Artista\Crear\Album;

use Carbon\Traits\Week;
use Livewire\Component;
use Livewire\WithFileUploads;

class Album extends Component
{
    use WithFileUploads;
    public $albumes, $nombreAlbum, $imagenAlbum, $fechaLanz, $cantCan;
    public $nombreArtista;
    public $canciones=[], $nombreCancion;

    protected $rules = [
        'nombreAlbum' => 'required|string|min:2|max:45',
        'fechaLanz' => 'required',
        'imagen' => 'required|image',
    ];

    protected $listeners =[
        'eliminarAlbum',
    ];
    
    public function agregarAlbum()
    {
        $imagenAlbum = $this->imagenAlbum
        ->store("/representantes/" . auth()->user()->rut . "/artistas/" . $this->nombreArtista . 
        "/Albumes/".$this->nombreAlbum."/");

        $this->albumes[]=[
        "nombreAlbum" => $this->nombreAlbum,
        "fechaLanz" => $this->fechaLanz,
        "cantCan" => $this->cantCan,
        "imagen" => $imagenAlbum,
        ];
        $this->nombreAlbum='';
        $this->fechaLanz='';
        $this->cantCan='';
        $this->imagenAlbum='';

    }

    public function eliminarAlbum($seleccionado) {
        unset($this->albumes[$seleccionado]);
    }

    public function eliminarImagenAlbum(){
        $this->imagenAlbum='';
    }

    public function nuevaCancion()
    {
        if ($this->nombreCancion != '') {
            $this->canciones[] = $this->nombreCancion;
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
