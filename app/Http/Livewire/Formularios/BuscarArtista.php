<?php

namespace App\Http\Livewire\Formularios;

use App\Models\Artista;
use Livewire\Component;

class BuscarArtista extends Component
{

    public $buscar;
    public $resultados;

    public function mount() {
        $this->resultados =  [
            (object) [
                "id" => 0,
                "ART_Nombre" => '¿Qué estás buscando?'
            ],
        ];
    }

    public function updatedBuscar()
    {
        if ($this->buscar != '') {
            $this->resultados = Artista::where("estado", 1)
            ->where("ART_Nombre", 'like', $this->buscar . '%')->get();
        } else  {
            $this->mount();
        }
    }

    public function render()
    {
        return view('livewire.formularios.buscar-artista');
    }
}
