<?php

namespace App\Http\Livewire\Estilo;

use Livewire\Component;
use App\Models\Estilo;

class Estilos extends Component
{

    public $estilos;
    
    public function mount()
    {
        $this->estilos = Estilo::all();
    }

    public function render()
    {
        return view('livewire.estilo.estilos');
    }
}
