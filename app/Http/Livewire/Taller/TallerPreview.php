<?php

namespace App\Http\Livewire\Taller;

use Livewire\Component;
use App\Models\Taller;

class TallerPreview extends Component
{

    public $talleres;
    public $tallerActual;

    public function mount() {
        $this->talleres = Taller::all();
        $this->mostrarTaller(Taller::count());
    }

    public function mostrarTaller($id) {
        $this->tallerActual = Taller::find($id);
        
    }

    public function render()
    {
        return view('livewire.taller.taller-preview');
    }
}
