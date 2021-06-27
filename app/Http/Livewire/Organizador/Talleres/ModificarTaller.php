<?php

namespace App\Http\Livewire\Organizador\Talleres;

use Livewire\Component;
use App\Models\Taller;
use Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ModificarTaller extends Component
{

    /**
     * Trait utilizado para subir archivos
     */
    use WithFileUploads;

    public $taller, $caracteres_descripcion = 0, $nuevaImagen;
    public $requisitos = [], $protocolos = [];

    protected $listeners = [
        "updatedRequisitos",
        "updatedProtocolos",
        "modificarTallerConfirmado",
    ];

    /**
     * Reglas para bindear la informacion
     * del taller seleccionado ademas de 
     * verificar que los campos
     * minimos obligatorios se han mantenido
     */
    protected $rules = [
        "taller.TAL_Nombre" => 'required|string',
        'taller.TAL_Fecha' => 'required',
        'taller.TAL_Hora' => 'required',
        'taller.TAL_Aforo' => 'required|integer',
        'taller.TAL_Lugar' => 'required|string',
        'taller.TAL_Descripcion' => 'required|string',
    ];

    /**
     * Bindea el taller con toda su informacion el cual 
     * ha sido seleccionado con el boton modificar ademas
     * en caso de que se intente acceder a un taller
     * que no es de su pertenencia se aborta la accion
     * 
     * @param $id 
     */
    public function mount($id)
    {
        $this->taller = Taller::find($id);
        $this->requisitos = $this->taller->TAL_Requisitos;
        $this->protocolos = $this->taller->TAL_Protocolo;
        $this->caracteres_descripcion = strlen($this->taller->TAL_Descripcion);

        if ($this->taller->user_rut != auth()->user()->rut) {
            abort(403);
        }
    }

    /**
     * Cada vez que se actualiza la descripcion del taller
     * se compara la cantidad de caracteres que ha ingresado
     * el usuario versus el maximo de 255 permitido
     */
    public function updatedTallerTalDescripcion()
    {
        $this->caracteres_descripcion = strlen($this->taller->TAL_Descripcion);
    }

    /**
     * Esta function es emitidad desde Requisitos para
     *  actualizar los requisitos cada vez que se agregue
     * o elimine uno nuevo
     */
    public function updatedRequisitos($value)
    {
        $this->requisitos = $value["requisitos"];
    }

    /**
     * Esta function es emitida desde Protocolos para
     * actualizar los protocolos cada vez que se aregue
     * o elimine uno nuevo
     */
    public function updatedProtocolos($value)
    {
        $this->protocolos = $value["protocolos"];
    }

    /**
     * Cada vez que se sube un nuevo archivoa l campo imagen
     * se valida que este sea solo de tipo imagen y con un
     * maximo de 2014kb
     */
    public function updatedNuevaImagen()
    {
        $this->validate([
            'nuevaImagen' => 'image|mimes:jpeg,png,svg,jpg,gif|max:1024',
        ]);
    }

    /**
     * Si el usuario decide eliminar la imagen 
     * actual que se encuentra almacenada en la base
     * de datos se ejecuta esta function
     */
    public function eliminarImagen()
    {
        $this->taller->imagen = '';
        $this->taller->save();
        $this->nuevaImagen =  null;
    }

    /**
     * Verifica que aun esten todos los
     * campos minimos obligatorios insertados
     * si es asi se envia una alerta para confirmar
     * la accion
     */
    public function modificarTaller()
    {
        $this->validate();
        $this->dispatchBrowserEvent("confirmarModificarTaller");
    }

    /**
     * Una vez que el organizador ha confirmado la accion
     * se modifica el taller seleccionado con la informacion
     * que ha sido ingresada, en caso de que la imagen
     * se haya modificado se reemplaza la actual con la nueva
     */
    public function modificarTallerConfirmado()
    {
        $taller = Taller::find($this->taller->id);
        $taller = $this->taller;
        $taller->TAL_Requisitos = implode(", ", $this->requisitos);
        $taller->TAL_Protocolo = implode(", ", $this->protocolos);
        $taller->solicitudes[0]->estado = 4;
        $taller->solicitudes[0]->save();

        if ($this->nuevaImagen != null) {
            Storage::delete($taller->imagen);
            $nuevaImagen = $this->nuevaImagen->store("/talleres/organizador/" . auth()->user()->rut);
            $taller->imagen = "storage/" . $nuevaImagen;
        }

        $taller->save();
    }

    public function render()
    {
        return view('livewire.organizador.talleres.modificar-taller');
    }
}
