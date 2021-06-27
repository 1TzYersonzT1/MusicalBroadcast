<?php

namespace App\Http\Livewire\Formularios;

use App\Models\Artista;
use Livewire\Component;

class BuscarArtista extends Component
{

    public $buscar;
    public $resultados;

    /**
     * Determina un estado por defecto para el buscador
     * de la barra de navegacion
     */
    public function mount()
    {
        $this->resultados =  [
            (object) [
                "id" => 0,
                "ART_Nombre" => '¿Qué estás buscando?'
            ],
        ];
    }

    /**
     * Cada vez que se modifica el input en la barra de navegacion
     * se realiza una consulta a la base de datos para buscar
     * conicidencias en la tabla de artistas.
     */
    public function updatedBuscar()
    {
        if ($this->buscar != '') {
            $this->resultados = Artista::where("estado", 1)
                ->where("ART_Nombre", 'like', $this->buscar . '%')->get();
        } else {
            $this->mount();
        }
    }

    public function render()
    {
        return view('livewire.formularios.buscar-artista');
    }
}
