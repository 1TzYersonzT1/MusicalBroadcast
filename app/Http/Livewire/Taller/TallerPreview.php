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
        $this->mostrarTaller($this->talleres[0]->id);
    }

    public function mostrarTaller($id) {
        $this->tallerActual = Taller::find($id);
        $this->dispatchBrowserEvent('onContentChanged');
    }

    public function render()
    {
        return view('livewire.taller.taller-preview');
    }
}
