<?php

namespace App\Http\Livewire\Organizador\Talleres\Crear\Protocolo;

use Livewire\Component;

class Protocolos extends Component
{

    public $protocolos = [];
    public $nuevoProtocolo;

    protected $listeners = [
        "eliminarProtocolo"
    ];

    /**
     * En caso de que el item sea distinto de nulo
     * se agrega al arreglo de protocolos y se emite
     * una function que pasa el nuevo arreglo de protocolos
     * finalmente limpia el campo para un nuevo item
     */
    public function nuevoItem()
    {
        if ($this->nuevoProtocolo != '') {
            $this->protocolos[] = $this->nuevoProtocolo;
            $this->emit("updatedProtocolos", array("protocolos" => $this->protocolos));
            $this->nuevoProtocolo = '';
        }
    }

    /**
     * Esta function es emitida desde el componente Protocolo, una vez
     * que se recibe el protocolo que ha sido seleccionado se procede
     * a su eliminacion y se actualiza el arreglo de protocolos  emitiendo
     * la function correspondiente al componente padre CrearTaller
     */
    public function eliminarProtocolo(array $seleccionado)
    {
        $key = array_search($seleccionado["protocolo"], $this->protocolos);
        unset($this->protocolos[$key]);
        $this->emit("updatedProtocolos", array("protocolos" => $this->protocolos));
    }

    public function render()
    {
        return view('livewire.organizador.talleres.crear.protocolo.protocolos');
    }
}
