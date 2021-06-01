<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;
use App\Models\Artista;

class Artistas extends Component
{
    public $artistas;
    public $artistaActual;
    protected $listeners=["buscar"];

    public function buscar(array $artistaSeleccionado){
        $this->artistaActual=Artista::where("ART_Nombre","like",$artistaSeleccionado['nombre']."%")->get();

    }

    public function mount()
    {
        $this->artistas = Artista::all();
    }



    public function render()
    {
        return view('livewire.artista.artistas');
    }
}
