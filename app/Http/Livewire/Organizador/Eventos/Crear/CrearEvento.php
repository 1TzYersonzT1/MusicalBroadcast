<?php

namespace App\Http\Livewire\Organizador\Eventos\Crear;

use Livewire\Component;
use App\Models\Evento;
use App\Models\SolicitudEvento;
use DateTime;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class CrearEvento extends Component
{

    /**
     * Trait necesario para subir archivos
     */
    use WithFileUploads;

    public $nombre, $fecha, $hoy, $hora, $lugar, $descripcion, $imagen,
        $caracteres_descripcion = 0;

    /**
     * Utilizada para limitar la eleccion de fechas solo de hoy
     * en adelante
     */
    public function mount()
    {
        $this->hoy = date("Y-m-d");
    }

    /**
     * Verificia que el organizador complete los campos
     * minimos necesarios para organizar un nuevo evento
     */
    protected $rules = [
        "nombre" => 'required|string|max:30',
        'fecha' => 'required',
        'hora' => 'required',
        'lugar' => 'required|string|max:40',
        'descripcion' => 'required|string|min:10|max:255',
        'imagen' => 'required|image|mimes:jpeg,jpg,png,svg,gif|max:1024',
    ];

    protected $listeners = [
        'nuevoEventoConfirmado',
    ];

    /**
     * Cada vez que se actualize la descripcion
     * del evento se modificara la cantidad de caracteres
     * que ha escrito el usuario para compararlos con
     * el maximo de caracteres permitido
     */
    public function updatedDescripcion()
    {
        $this->caracteres_descripcion = strlen($this->descripcion);
    }

    /**
     * Cada vez que se inserta un nuevo archivo al campo imagen
     * se verifica que esta sea una imagen y no otro tipo de archivo
     * ademas de un limite maximo de 1024kb
     */
    public function updatedImagen()
    {
        $this->validate([
            'imagen' => 'required|image|mimes:jpeg,jpg,png,svg,gif|max:1024'
        ]);
    }

    /**
     * Verifica que el organizador haya indicado
     * los campos obligatorios minimos y se envia
     * una alerta para confirmar la accion
     */
    public function validarNuevoEvento()
    {
        $this->validate();
        $this->dispatchBrowserEvent("validarNuevoEvento");
    }

    /**
     * Una vez que el organizador ha confirmado la accion
     * se almacena la imagen del evento, se crea el evento
     * con un estado inactivo(0) y su solicitud en estado
     * pendiente(0)
     */
    public function nuevoEventoConfirmado()
    {
        $imagen = $this->imagen->store("/eventos/organizador/" . auth()->user()->rut);

        $evento = Evento::create([
            'user_rut' => auth()->user()->rut,
            'EVE_Nombre' => $this->nombre,
            'EVE_Descripcion' => $this->descripcion,
            'EVE_Lugar' => $this->lugar,
            'EVE_Fecha' => $this->fecha,
            'EVE_Hora' => $this->hora,
            'imagen' => 'storage/' . $imagen,
            'estado' => 0,
        ]);

        $solicitud = SolicitudEvento::create([
            'observacion' => '',
            'estado' => 0,
            'evento_id' => $evento->id,
        ]);
    }

    public function render()
    {
        return view('livewire.organizador.eventos.crear.crear-evento');
    }
}
