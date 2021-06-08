<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;
use App\Models\Artista;

class Artistas extends Component
{


    public $artistas;

    public function mount()
    {
        $this->artistas = Artista::all();
    }

    public function render()
    {
        return view('livewire.artista.artistas');
    }
}
