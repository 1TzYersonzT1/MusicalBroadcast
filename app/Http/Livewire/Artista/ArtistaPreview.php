<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;
use App\Models\Artista;
class ArtistaPreview extends Component
{

    public $artistas, $artistaActual; 

    public function mount()
    {
        $this->artistas = Artista::all();
    }

    protected $listeners = ['visualizar-ART'=>'visualizar'];

    public function visualizar(array $artistaSeleccionado)
    {
        $this->artistaActual = Artista::find($artistaSeleccionado["id"]);
        $this->dispatchBrowserEvent('verArtista');
    }

    public function render()
    {
        return view('livewire.artista.artista-preview');
    }
}
