<?php

namespace App\Http\Livewire\Organizador\Eventos;

use Livewire\Component;
use App\Models\Evento;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ModificarEvento extends Component
{

    use WithFileUploads;

    public $evento, $nuevaImagen, $hoy,  $caracteres_descripcion = 0;

    /**
     * Valida si el organizador del evento esta indicando
     * los campos minimos obligatorios al momento
     * de modificar un evento
     */
    protected $rules = [
        "evento.EVE_Nombre" => 'required|string|max:30',
        'evento.EVE_Descripcion' => 'required|string|min:10|max:255',
        "evento.EVE_Fecha" => 'required',
        "evento.EVE_Hora" => 'required',
        "evento.EVE_Lugar" => 'required|string|max:40',
    ];

    protected $listeners = ["modificarEventoConfirmado"];

    /**
     * Bindea la informacion del evento que se ha
     * seleccionado con el boton en el componente padre MisEventos,
     * establece la cantidad de caracteres segun la descripcion actual
     * del evento y establece el rango de fecha minimo desde hoy
     * en adelante.
     */
    public function mount($id)
    {
        $this->evento = Evento::find($id);
        $this->caracteres_descripcion = strlen($this->evento->EVE_Descripcion);
        $this->hoy = date("Y-m-d");

        if ($this->evento->user_rut != auth()->user()->rut) {
            abort(403);
        }
    }

    /**
     * Verifica que cada vez que se suba un nuevo archivo al campo
     * imagen este sea solo de tipo imagen y con un maximo de 1024kb
     */
    public function updatedNuevaImagen()
    {
        $this->validate([
            "nuevaImagen" => 'image|mimes:jpeg,jpg,png,gif,svg|max:1024',
        ]);
    }

    /**
     * Cada vez que el organizador modifica la descripcion del evento
     * se contabiliza la cantidad de caracteres que ha ingresado
     * para compararlos con el maximo dw 255 caracteres permitidos
     */
    public function updatedEventoEVEDescripcion()
    {
        $this->caracteres_descripcion = strlen($this->evento->EVE_Descripcion);
    }

    /**
     * Valida que el organizador haya indicado
     * los campos minimos obligatorios para modificar el evento
     * , si es asi envia una alerta para confirmar la accion
     * con los datos nuevos
     */
    public function modificarEvento()
    {
        $this->validate();
        $this->dispatchBrowserEvent("confirmarModificarEvento");
    }

    /**
     * Una vez que el organizador ha confirmado la accion
     * se bindea el evento actual que esta modificandose y 
     * reemplaza la imagen en caso de existir una nueva, luego 
     * modifica el estado de la solicitud a modificada (4) y
     * envia una alerta con un mensaje de exito
     */
    public function modificarEventoConfirmado()
    {
        $evento = Evento::find($this->evento->id);
        $evento = $this->evento;

        if ($this->nuevaImagen) {
            Storage::delete($evento->imagen);
            $nuevaImagen = $this->nuevaImagen->store("/eventos/organizador/" . auth()->user()->rut);
            $evento->imagen = "storage/" . $nuevaImagen;
        }

        $evento->solicitudes[0]->estado = 4;
        $evento->solicitudes[0]->save();
        $evento->save();

        $this->dispatchBrowserEvent("eventoModificado");
    }

    public function render()
    {
        return view('livewire.organizador.eventos.modificar-evento');
    }
}
