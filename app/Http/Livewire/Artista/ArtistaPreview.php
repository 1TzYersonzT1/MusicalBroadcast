<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;
use App\Models\Artista;
class ArtistaPreview extends Component
{

    public $artistaActual; 

    protected $listeners = ['visualiza' => 'visualizar'];

    public function visualizar(array $artistaSeleccionado)
    {
        $this->artistaActual = Artista::find($artistaSeleccionado["id"]);
  
    }

    public function render()
    {
        return view('livewire.artista.artista-preview');
    }
}
