<?php

namespace App\Http\Livewire\Formularios;

use Livewire\Component;

class FiltroArtista extends Component
{
    public $buscar;
    public $resultados;

    public function updatedBuscar()
    {
        $this->resultados = [
            (object) array("ART_Nombre" => '¿Qué estás buscando?')
        ];  

        if ($this->buscar != '') {
            $this->resultados = Artista::where("ART_Nombre", 'like', $this->buscar . '%')->get();
        }   
    }
    public function render()
    {
        return view('livewire.formularios.filtro-artista');
    }
}
