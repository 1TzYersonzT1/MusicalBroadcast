<?php

namespace App\Http\Livewire\Evento;

use Livewire\Component;
use App\Models\Evento;
use DateTime;

class Eventos extends Component
{

    public $eventos;

    public function mount() {
        $this->eventos = Evento::orderBy("EVE_Horario", "asc")
        ->where("EVE_Horario", ">", new DateTime())
        ->get();
    }

    public function render()
    {
        return view('livewire.evento.eventos');
    }
}
