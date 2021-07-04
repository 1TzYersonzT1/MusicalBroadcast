<?php

namespace App\Http\Livewire\Representante\Artista\Modificar;

use Livewire\Component;

class Estilo extends Component
{

    // public $info, $index, $estilosSeleccionados = [];

    // public function updatedEstilosSeleccionados()
    // {
    //     $this->emitTo(
    //         'representante.artista.modificar.modificar-artista',
    //         'updatedEstilosSeleccionados',
    //         $this->estilosSeleccionados
    //     );
    // }

    public function render()
    {
        return view('livewire.representante.artista.modificar.estilo');
    }
}
