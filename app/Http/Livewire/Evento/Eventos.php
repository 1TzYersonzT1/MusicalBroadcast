<?php

namespace App\Http\Livewire\Evento;

use Livewire\Component;
use App\Models\Evento;
use DateTime;

class Eventos extends Component
{

    public $eventos;

    /**
     * Selecciona de la base de datos todos los
     * eventos que se encuentren en estado activo (1)
     * que tengan su realizacion sea desde hoy en adelante
     * y los organiza de manera ascedente para visualizar
     * los eventos que se realizarán pronto primero.
     */
    public function mount()
    {
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
