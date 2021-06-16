<?php

namespace App\Http\Livewire\Artista;

use App\Models\Estilo;
use App\Models\Genero;
use Livewire\Component;

class CrearArtista extends Component
{

    public $estilos;
    public $generos;

    public function mount() {
        $this->estilos = Estilo::all();
        $this->generos = Genero::all();
    }

    public function render()
    {
        return view('livewire.artista.crear-artista');
    }
}
