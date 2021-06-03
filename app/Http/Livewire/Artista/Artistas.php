<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;
use App\Models\Artista;

class Artistas extends Component
{

    public $artistas, $slideActual;

    public function mount()
    {
        $this->artistas = Artista::all();
    }

    public function mostrarArtista()
    {
        $this->emit('visualizar', array('id' => $this->artista->id, 'slideActual' => $this->slideActual));
    }


    public function render()
    {
        return view('livewire.artista.artistas');
    }
}
