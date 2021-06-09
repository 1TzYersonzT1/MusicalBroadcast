<?php

namespace App\Http\Livewire\Formularios;

use Livewire\Component;

class FiltroArtista extends Component
{
    public $nombreArtista;

    public function updatedNombreArtista()
    {
        $this->emitTo("artista.artistas", "updatedNombreArtista", array("nombreArtista" => $this->nombreArtista));
    }
    public function render()
    {
        return view('livewire.formularios.filtro-artista');
    }
}
