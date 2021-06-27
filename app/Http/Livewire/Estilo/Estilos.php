<?php

namespace App\Http\Livewire\Estilo;

use Livewire\Component;
use App\Models\Estilo;

class Estilos extends Component
{

    public $estilos, $seleccionados = [];

    /**
     * Selecciona todos los estilos musicales
     * para ser cargados en el filtro
     */
    public function mount()
    {
        $this->estilos = Estilo::all();
    }

    /**
     * Si un estilo ha sido deseleccionado
     * se debe eliminar del arreglo ya que por defecto
     * se agrega un false
     */
    public function updated()
    {
        foreach ($this->seleccionados as $index => $seleccionado) {
            if ($this->seleccionados[$index] == false) {
                unset($this->seleccionados[$index]);
            }
        }
    }

    /**
     * Cada vez que se actualiza la lista de estilos seleccionados
     * se emite un evento al componente padre para anidar la busqueda
     * de artistas con los estilos que ha seleccionado el usuario.
     */
    public function updatedSeleccionados()
    {
        $this->emitTo("artista.artistas", "updatedEstilos", array("seleccionados" => $this->seleccionados));
    }


    public function render()
    {
        return view('livewire.estilo.estilos');
    }
}
