<?php

namespace App\Http\Livewire\Representante\Artista;

use App\Models\Artista;
use Livewire\Component;

class TusArtistas extends Component
{

    public function render()
    {
        return view('livewire.representante.artista.tus-artistas', [
            "artistas" => Artista::where("user_rut", auth()->user()->rut)
            ->paginate(4),
        ]);
    }
    
}
