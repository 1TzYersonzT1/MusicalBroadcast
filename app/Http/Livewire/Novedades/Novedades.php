<?php

namespace App\Http\Livewire\Novedades;

use Livewire\Component;
use App\Models\Novedad;
use DateTime;

class Novedades extends Component
{

    public $novedades;

    public function mount() {
        $this->novedades = Novedad::orderBy("horario_publicacion", "asc")
        ->where("horario_publicacion", ">", new DateTime())
        ->get(); 
    }

    public function render()
    {
        return view('livewire.novedades.novedades');
    }
}
