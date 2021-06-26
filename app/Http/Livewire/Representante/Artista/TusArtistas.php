<?php

namespace App\Http\Livewire\Representante\Artista;

use App\Models\Artista;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class TusArtistas extends Component
{
    public $artistas;

    public function mount() {
        $this->artistas = Artista::where("user_rut", auth()->user()->rut)
        ->whereHas('solicitud', function(Builder $query) {
            return $query->where("estado", '!=', 0);
        })
        ->get();
    }

    public function render()
    {
        return view('livewire.representante.artista.tus-artistas');
    }
    
}
