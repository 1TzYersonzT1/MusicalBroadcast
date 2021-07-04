<?php

namespace App\Http\Livewire\Representante\Artista;

use App\Models\Artista;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class TusArtistas extends Component
{
    public $artistas;

    /**
     * Selecciona los artistas que pertenecen
     * al representante autenticado y solo aquellos
     * que tengan un estado activo
     */
    public function mount()
    {
        $this->artistas = Artista::where("user_rut", auth()->user()->rut)
            ->where("estado", 1)
            ->get();
    }

    public function render()
    {
        return view('livewire.representante.artista.tus-artistas');
    }
}
