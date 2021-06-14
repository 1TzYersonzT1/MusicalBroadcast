<?php

namespace App\Http\Livewire\Evento;

use Livewire\Component;
use App\Models\Evento;
use DateTime;

class Eventos extends Component
{

    public $eventos;

    public function mount() {
        $this->eventos = Evento::orderBy("EVE_Fecha", "asc")
        ->where("EVE_Fecha", ">=", new DateTime())
        ->where("estado", 1)
        ->get();
    }

    public function render()
    {
        return view('livewire.evento.eventos');
    }
}
