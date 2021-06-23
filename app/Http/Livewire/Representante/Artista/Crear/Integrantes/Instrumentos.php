<?php

namespace App\Http\Livewire\Representante\Artista\Crear\Integrantes;

use App\Models\Instrumento;
use Livewire\Component;

class Instrumentos extends Component
{

    public $instrumentos, $instrumentosSeleccionados;

    public function mount() {
        $this->instrumentos = Instrumento::all();
    }

    public function updated() {
        foreach($this->instrumentosSeleccionados as $index => $instrumentoSeleccionado) {
            if($this->instrumentosSeleccionados[$index] == false) {
                unset($this->instrumentosSeleccionados[$index]);
            }
        }
    }

    public function updatedInstrumentosSeleccionados() {
        $this->emitTo("representante.artista.crear.integrantes.nuevo-integrante",
        'updatedInstrumentosSeleccionados', $this->instrumentosSeleccionados);
    }


    public function render()
    {
        return view('livewire.representante.artista.crear.integrantes.instrumentos');
    }
}
