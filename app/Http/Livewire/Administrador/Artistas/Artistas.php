<?php

namespace App\Http\Livewire\Administrador\Artistas;

use Livewire\Component;
use App\Models\SolicitudArtista;

class Artistas extends Component
{

    public $artistasPendientes;

    public function mount() {
        $this->artistasPendientes = SolicitudArtista::where("estado", 1)->get();
    }

    public function render()
    {
        return view('livewire.administrador.artistas.artistas');
    }
}
