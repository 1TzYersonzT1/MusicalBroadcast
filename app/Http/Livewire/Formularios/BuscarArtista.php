<?php

namespace App\Http\Livewire\Formularios;

use Livewire\Component;

class BuscarArtista extends Component
{

    public $buscar;
    public $resultado;

    public function search(){
        $this->emit("buscar",array("nombre"=>$this->buscar));
    }
    public function render()
    {
        return view('livewire.formularios.buscar-artista');
    }
}
