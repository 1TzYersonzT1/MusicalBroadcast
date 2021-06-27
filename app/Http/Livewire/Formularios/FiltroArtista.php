<?php

namespace App\Http\Livewire\Formularios;

use Livewire\Component;

class FiltroArtista extends Component
{
    public $nombreArtista;

    /**
     * Cada vez que se actualiza el input
     * en el filtro de artistas se emite
     * un evento hacia el componente padre
     * con el valor contenido para
     * modificar la consulta que se realiza
     */
    public function updatedNombreArtista()
    {
        $this->emitTo("artista.artistas", "updatedNombreArtista", array("nombreArtista" => $this->nombreArtista));
    }
    public function render()
    {
        return view('livewire.formularios.filtro-artista');
    }
}
