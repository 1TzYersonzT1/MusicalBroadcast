<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;
use App\Models\Artista;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class Artistas extends Component
{

    use WithPagination;

    public $nombreArtista = '';
    public $genero = "Rock";
    public $estilo = '';

    protected $listeners = ["updatedNombreArtista", "updatedGenero", "updatedEstilo"];

    public function updatedNombreArtista(array $busqueda)
    {
        $this->nombreArtista = $busqueda["nombreArtista"];
        $this->resetPage();
    }

    public function updatedGenero(array $busqueda)
    {
        $this->genero = $busqueda["generoArtista"];
        $this->resetPage();
    }

    public function updatedEstilo(array $busqueda)
    {
        $this->estilo = $busqueda["estiloArtista"];
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.artista.artistas', [
            'artistas' => Artista::whereHas('estilos', function (Builder $query) {
                $query->where("EST_Nombre", "=", $this->estilo);
            })
            ->orWhere("ART_Nombre", 'like', $this->nombreArtista . '%')
            ->paginate(8),
        ]);
    }
}
