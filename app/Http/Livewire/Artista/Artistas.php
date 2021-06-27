<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;
use App\Models\Artista;
use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

class Artistas extends Component
{

    /**
     * Trait necesario para la paginacion
     */
    use WithPagination;

    public $nombreArtista;
    public $generos, $estilos;
    public $tipos, $tiposSeleccionados = [];

    protected $listeners = [
        "updatedNombreArtista",
        "updatedEstilos"
    ];

    public function mount()
    {
        $this->tipos = [
            "Solista",
            "Banda",
        ];
    }

    /**
     * La busqueda por nombre debe reiniciar
     * los resultados a la pagina 1
     */
    public function updatedNombreArtista(array $busqueda)
    {
        $this->nombreArtista = $busqueda["nombreArtista"];
        $this->resetPage();
    }

    /**
     * La busqueda por estilos debe reiniciar
     * los resultados a la pagina 1. Esta function 
     * es ejecutada cuando un genero o estilo ha sido
     * seleccionado.
     */
    public function updatedEstilos(array $estilos)
    {
        $this->estilos = $estilos["seleccionados"];
        $this->resetPage();
    }

    /**
     * Si un tipo de artista ha sido deseleccionado
     * se elimina del arreglo ya que su valor por defecto
     * se reemplaza por false.
     */
    public function updated()
    {
        foreach ($this->tiposSeleccionados as $index => $seleccionado) {
            if ($this->tiposSeleccionados[$index] == false) {
                unset($this->tiposSeleccionados[$index]);
            }
        }
    }

    /**
     * Una vez que el DOM renderiza este componente, se 
     * seleccionan todos los estistas que tengan un estado
     * activo (1) ademas de que su nombre debe condicir o no
     * con el nombre indicando en el buscador, si los estilos
     * han sido seleccionados se anida la consulta con estilos,
     * lo mismo sucede con el tipo de artista.
     */
    public function render()
    {
        $artistas = Artista::when($this->estilos, function ($query) {
            return $query->whereHas("estilos", function (Builder $query) {
                return $query->whereIn("EST_Nombre", $this->estilos);
            });
        })
            ->when($this->tiposSeleccionados, function ($query) {
                return $query->whereIn("tipo_artista", $this->tiposSeleccionados);
            })
            ->where("ART_Nombre", "like", $this->nombreArtista . "%")
            ->where("estado", 1)
            ->paginate(8);

        return view('livewire.artista.artistas', [
            'artistas' => $artistas
        ]);
    }
}
