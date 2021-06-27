<?php

namespace App\Http\Livewire\Organizador\Talleres\Crear\Requisito;

use Livewire\Component;

class Requisitos extends Component
{

    public $requisitos = [];
    public $nuevoRequisito;

    protected $listeners = [
        "eliminarRequisito"
    ];

    /**
     * Si el nuevo requusito es distinto de nulo
     * se agrega al arreglo de requisitos y se emite
     * una function hacia el componente padre
     * CrearTaller para actualizar el arreglo de requisitos 
     * con el nuevo item, finalmente se prepara el input
     * para insertar un nuevo requisito
     */
    public function nuevoItem()
    {
        if ($this->nuevoRequisito != '') {
            $this->requisitos[] = $this->nuevoRequisito;
            $this->emit("updatedRequisitos", array("requisitos" => $this->requisitos));
            $this->nuevoRequisito = '';
        }
    }

    /**
     * Esta function es emitida desde el componente Requisito
     * una vez que se ha seleccionado el requisito se procede
     * a su eliminacion y se actualiza el arreglo de requisitos
     * en el componente padre CrearTaller
     */
    public function eliminarRequisito(array $seleccionado)
    {
        $key = array_search($seleccionado["requisito"], $this->requisitos);
        unset($this->requisitos[$key]);
        $this->emit("updatedRequisitos", array("requisitos" => $this->requisitos));
    }

    public function render()
    {
        return view('livewire.organizador.talleres.crear.requisito.requisitos');
    }
}
