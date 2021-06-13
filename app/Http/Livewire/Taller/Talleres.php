<?php

namespace App\Http\Livewire\Taller;

use Livewire\Component;
use DateTime;
use App\Models\Taller;


class Talleres extends Component
{

    public $talleres;

    public function mount()
    {
        $this->talleres = Taller::orderBy('TAL_Fecha', 'asc')
            ->whereDate('TAL_Fecha', '>=', new DateTime())
            ->where('TAL_Aforo', '>', 0)
            ->where("estado", 1)
            ->get();
    }

    public function render()
    {
        return view('livewire.taller.talleres');
    }
}
