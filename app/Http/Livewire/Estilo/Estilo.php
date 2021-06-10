<?php

namespace App\Http\Livewire\Estilo;

use Livewire\Component;

class Estilo extends Component
{

    public $estilo;
    
    public function render()
    {
        return view('livewire.estilo.estilo');
    }
}
