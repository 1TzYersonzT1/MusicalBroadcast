<?php

namespace App\Http\Livewire\Genero;

use Livewire\Component;
use App\Models\Genero;
use App\Models\Estilo;

class Generos extends Component
{
    public $generos, $seleccionados = [];

    /**
     * Selecciona todos los generos musicales
     */
    public function mount()
    {
        $this->generos = Genero::all();
    }

    /**
     * Cada vez que se deselecciona un genero
     * es necesario eliminar el valor por defecto
     * que se agrega el cual es false
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
     * Realiza una busqueda de todos los estilos que estan asociados
     * al genero seleccionado, luego emite la function al evento padre
     * para actualizar los estilos, de esta forma
     * es posible acceder al genero teniendo acceso a todos los estilos.
     */
    public function updatedSeleccionados()
    {
        $estilos = Estilo::select("EST_Nombre")->whereIn("genero_id", $this->seleccionados)->get();
        $this->emitTo('artista.artistas', 'updatedEstilos', array('seleccionados' => $estilos));
    }

    public function render()
    {
        return view('livewire.genero.generos');
    }
}
