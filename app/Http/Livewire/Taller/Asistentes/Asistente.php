<?php

namespace App\Http\Livewire\Taller\Asistentes;

use App\Models\Asistente as ModelsAsistente;
use App\Models\Taller;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Asistente extends Component
{
    public function render()
    {
        return view('livewire.taller.asistentes.asistente');
    }
}
