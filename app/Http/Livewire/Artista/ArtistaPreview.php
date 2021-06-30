<?php

namespace App\Http\Livewire\Artista;

use Livewire\Component;
use App\Models\Artista;

class ArtistaPreview extends Component
{

   public $artistaActual; 

    /**
     * 
     */
   public function mount(Artista $artista) {
       $this->artistaActual = $artista;
   }

    public function render()
    {
        return view('livewire.artista.artista-preview');
    }
}
