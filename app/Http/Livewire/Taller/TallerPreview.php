<?php

namespace App\Http\Livewire\Taller;

use Livewire\Component;
use App\Models\Taller;
use DateTime;

class TallerPreview extends Component
{

    public $talleres;
    public $tallerActual;

    public function mount() {
        $this->talleres = Taller::orderBy('TAL_Horario', 'asc')->where('TAL_Horario', '>', new DateTime())->get();
        $this->mostrarTaller($this->talleres[0]->id, 0);
    }

    public function mostrarTaller($id, $slideActual) {
        $this->tallerActual = Taller::find($id);
        $this->dispatchBrowserEvent('onContentChanged', ["slideActual" => $slideActual]);
    }

    public function render()
    {
        return view('livewire.taller.taller-preview');
    }
}
