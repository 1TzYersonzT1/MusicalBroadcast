<?php

namespace App\Http\Livewire\Genero;

use Livewire\Component;
use App\Models\Genero;

class Generos extends Component
{
    public $generos;

    public function mount()
    {
        $this->generos = Genero::all();
    }

    public function render()
    {
        return view('livewire.genero.generos');
    }
}
