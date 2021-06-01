<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;
use App\Models\Artista;

class Artistas extends Component
{
    public $artistas;
<<<<<<< HEAD
    public function mount(){
    $this->artistas=Artista::all();
=======
    public $artistaActual;
    protected $listeners=["buscar"];

    public function buscar(array $artistaSeleccionado){
        $this->artistaActual=Artista::where("ART_Nombre","like",$artistaSeleccionado['nombre']."%")->get();

    }

    public function mount()
    {
        $this->artistas = Artista::all();
>>>>>>> a8da563e52537cfca607a37d478218185d17cf7b
    }



    public function render()
    {
        return view('livewire.artista.artistas');
    }
}
