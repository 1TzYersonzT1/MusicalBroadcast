<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;
use App\Models\Artista;
use Livewire\WithPagination;

class Artistas extends Component
{

    use WithPagination;

    public $nombreArtista = '';

    protected $listeners = ["updatedNombreArtista"];

    public function updatedNombreArtista(array $busqueda) {
        $this->nombreArtista = $busqueda["nombreArtista"];
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.artista.artistas', [
            'artistas' => Artista::where("ART_Nombre", 'like', $this->nombreArtista . '%')
            ->paginate(8),
        ]);
    }
}
