<?php

namespace App\Http\Livewire\Taller;

use Livewire\Component;

class Taller extends Component
{

    public $taller, $slideActual;

    public function mostrarTaller()
    {
        $this->emit('visualizar', array('id' => $this->taller->id, 'slideActual' => $this->slideActual));
    }

    public function render()
    {
        return view('livewire.taller.taller');
    }
}
