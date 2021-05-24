<?php

namespace App\Http\Livewire\Taller;

use Gate;
use Livewire\Component;

class CrearTaller extends Component
{
    
    public function render()
    {
        if (Gate::denies('organizar')) {
            abort(403);
        }
        return view('livewire.taller.crear-taller');
    }
}
