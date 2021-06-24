<?php

namespace App\Http\Livewire\Representante\Artista;

use App\Models\Artista;
use Livewire\Component;

class TusArtistas extends Component
{
    public $artistas;

    public function mount() {
        $this->artistas = Artista::where("user_rut", auth()->user()->rut)->get();
    }

    public function render()
    {
        return view('livewire.representante.artista.tus-artistas');
    }
    
}
