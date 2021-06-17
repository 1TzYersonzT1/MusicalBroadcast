<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;
use App\Models\Artista;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;
use App\Models\Estilo;

class Artistas extends Component
{

    use WithPagination;

    public $nombreArtista;
    public $generos, $estilos;
    public $tipos, $tiposSeleccionados = [];

    protected $listeners = ["updatedNombreArtista", "updatedEstilos"];

    public function mount() {
        $this->tipos = [
            "Solista",
            "Banda",
        ];
    }

    public function updatedNombreArtista(array $busqueda)
    {
        $this->nombreArtista = $busqueda["nombreArtista"];
        $this->resetPage();
    }

    public function updatedEstilos(array $estilos) {
        $this->estilos = $estilos["seleccionados"];
        $this->resetPage();
    }

    public function updated() {
        foreach($this->tiposSeleccionados as $index => $seleccionado) {
            if($this->tiposSeleccionados[$index] == false) {
                unset($this->tiposSeleccionados[$index]);
            }
        }
    }

    public function render()
    {
        $artistas = Artista::when($this->estilos, function ($query) {
            return $query->whereHas("estilos", function (Builder $query) {   
                 return $query->whereIn("EST_Nombre", $this->estilos);
                 
            });
        })
        ->when($this->tiposSeleccionados, function($query) {
            return $query->whereIn("tipo_artista", $this->tiposSeleccionados);
        })
        ->where("ART_Nombre", "like", $this->nombreArtista . "%")
        ->paginate(8);

        return view('livewire.artista.artistas', [
            'artistas' => $artistas
        ]);
    }
}
