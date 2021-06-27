<?php

namespace App\Http\Livewire\Evento;

use App\Mail\Eventos\Organizador\NuevoAsistenteEvento;
use App\Mail\Eventos\PeticionEventoExitosa;
use Livewire\Component;
use App\Models\Evento;
use App\Models\Artista;
use Illuminate\Support\Facades\Mail;

class EventoPreview extends Component
{

    public $eventoActual, $artistasSeleccionados = [];

    protected $listeners = [
        "visualizar-evento" => 'visualizar',
        'aprobarEvento',
        'validarPeticiones',
        'envioPeticionesConfirmado',
        'updatedArtistasSeleccionados',
    ];

    protected $messages = [
        'artistasSeleccionados.required' => 'Debe seleccionar al menos 1 artista antes de enviar una petición.'
    ];

    /**
     * Realiza la busqueda segun el evento que se ha seleccionado
     * desde el componente hijo, se envia un evento al navegador
     * con el indice actual para controlar el slider.
     */
    public function visualizar(array $eventoSeleccionado)
    {
        $this->eventoActual = Evento::find($eventoSeleccionado["id"]);
        $this->dispatchBrowserEvent("mostrarEvento", array("slideActual" => $eventoSeleccionado["slideActual"]));
    }

    /**
     * Verifica si el representante ha seleccionado al menos
     * un artista, si lo ha hecho se envia una alerta de confirmacion
     * para inscribir a ese o mas artistas al evento actual.
     */
    public function validarPeticiones()
    {
        $this->validate([
            'artistasSeleccionados' => 'required|array|min:0',
        ]);
        $this->dispatchBrowserEvent('confirmarEnvioPeticiones');
    }


    /**
     * Una vez que el representante ha confirmado que desea
     * inscribir al o los artistas seleccionados, se realiza
     * una busqueda de cada uno de estos artistas y se le envia
     * un mensaje a los respectivos representantes, asi como al
     * organizador del evento para indicarle que tiene un
     * nuevo pariticpante.
     */
    public function envioPeticionesConfirmado()
    {
        foreach ($this->artistasSeleccionados as $artistaSeleccionado) {

            $artista = Artista::find($artistaSeleccionado);

            $mensaje = [
                "artista" => $artista,
                "evento" => $this->eventoActual,
                "organizador" => $this->eventoActual->organizador,
            ];

            Mail::to($this->eventoActual->organizador)->send(new NuevoAsistenteEvento($mensaje));
            Mail::to($artista->representante->email)->send(new PeticionEventoExitosa($mensaje));
        }
        $this->eventoActual->artistas()->syncWithoutDetaching($this->artistasSeleccionados);
    }

    /**
     * Modifica el listado de artistas seleccionados
     * en caso de que el representante desee
     * agregar más de un artista en un solo
     * click
     */
    public function updatedArtistasSeleccionados($value)
    {
        $this->artistasSeleccionados = $value;
    }

    public function render()
    {
        return view('livewire.evento.evento-preview');
    }
}
