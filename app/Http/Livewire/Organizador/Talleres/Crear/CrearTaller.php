<?php

namespace App\Http\Livewire\Organizador\Talleres\Crear;

use Gate;
use Livewire\Component;
use App\Models\Taller;
use App\Models\SolicitudTaller;
use Auth; // Es probable que indique un error pero no afecta
use Carbon\Carbon;
use Livewire\WithFileUploads;

class CrearTaller extends Component
{

    /**
     * Trait necesario para subir archivos
     */
    use WithFileUploads;

    public $titulo, $descripcion, $aforo, $hora, $lugar, $user_rut, $fecha, $hoy, $imagen;
    public $caracteres_descripcion = 0;
    public $protocolos = [], $requisitos = [];

    /**
     * Las reglas que aplican 
     * a los campos minimos obligatorios
     * para organizar un nuevo taller
     */
    protected $rules = [
        'titulo' => ['required', 'string', 'max:30'],
        'hora' => ['required', 'date_format:H:i'],
        'aforo' => ['required', 'integer'],
        'lugar' => ['required', 'string', 'max:55'],
        'descripcion' => ['required', 'string', 'max:255'],
        'imagen' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024',
        'protocolos' => 'required|array|min:1',
        'requisitos' => 'required|array|min:1',
    ];

    protected $listeners = [
        'updatedRequisitos',
        'updatedProtocolos',
        'nuevoTallerConfirmado',
    ];

    /**
     * Se encarga de limitar el minimo de fecha
     * al dia actual
     */
    public function mount() {
        $this->hoy = date('Y-m-d');
    }

    /**
     * Cada vez que se actualiza el campo de descripcion se contabiliza
     * la cantidad de caracteres para compararlos con el maximo de 255
     * permitidos
     */
    public function updatedDescripcion()
    {
        $this->caracteres_descripcion = strlen($this->descripcion);
    }

    /**
     * Esta function es emitida desde el componente Requisitos
     * y trae consigo el arreglo de requisitos actualizado
     * cada vez que se aniade o elimina un nuevo requisito
     */
    public function updatedRequisitos($value)
    {
        $this->requisitos = $value['requisitos'];
    }

    /**
     * Esta function es emitida desde el componente Protcolos
     * y trae consigo el arreglo de protocolos actualizado
     * cada vez que se aniade o elimina un nuevo protocolo
     */
    public function updatedProtocolos($value)
    {
        $this->protocolos = $value['protocolos'];
    }

    /**
     * Cada vez que se sube un archivo al campo imagen
     * se valida que este sea solo de tipo imagen con un
     * maximo de 1024kb
     */
    public function updatedImagen()
    {
        $this->validate([
            'imagen' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024',
        ]);
    }

    /**
     * Se encarga de eliminar la vista previa de la
     * imagen
     */
    public function eliminarImagen()
    {
        $this->imagen = '';
    }

    /**
     * Verifica que todos los campos minimos
     * hayan sido ingresados por el organizador
     * si es asi envia una alerta para confirmar 
     * la accion
     */
    public function validarNuevoTaller()
    {
        $this->validate();
        $this->dispatchBrowserEvent("validarNuevoTaller");
    }

    /** 
     * Una vez que el organizador ha confirmado la accion
     * almacena la imagen del taller y crea
     * un taller en estado inactivo (0) junto a su solicitud
     * en estado pendiente (0) finalmente envia
     * una alerta de exito
     */
    public function nuevoTallerConfirmado()
    {
        $imagen = $this->imagen->store("/talleres/organizador/" . auth()->user()->rut . '/' . $this->titulo, 'azure');

        $taller = Taller::create([
            'TAL_Nombre' => $this->titulo,
            'TAL_Descripcion' => $this->descripcion,
            'TAL_Requisitos' => implode(", ", $this->requisitos),
            'TAL_Protocolo' => implode(", ", $this->protocolos),
            'TAL_Aforo' => $this->aforo,
            'TAL_Fecha' => Carbon::parse(date_create($this->fecha))->isoFormat("Y-M-D"),
            'TAL_Hora' =>  $this->hora,
            'TAL_Lugar' => $this->lugar,
            'estado' => 0,
            'user_rut' => Auth::user()->rut,
            'imagen' => $imagen,
        ]);

        $solicitud = SolicitudTaller::create([
            'observacion' => '',
            'estado' => 0,
            'taller_id' => $taller->id,
        ]);
    }

    public function render()
    {
        return view('livewire.organizador.talleres.crear.crear-taller');
    }
}
