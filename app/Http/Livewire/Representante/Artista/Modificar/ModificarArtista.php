<?php

namespace App\Http\Livewire\Representante\Artista\Modificar;

use Livewire\Component;
use App\Models\Artista;
use App\Models\Genero;
use App\Models\Estilo;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Auth;

class ModificarArtista extends Component
{

    use WithFileUploads;

    public $artista, $nuevaImagen, $integrantes = [], $caracteres_biografia;
    public $generos, $generos_actuales, $generosSeleccionados = [];
    public $estilos = [], $estilosSeleccionados = [];
    public $albumes = [];

    protected $rules = [
        'artista.ART_Nombre' => 'required|string',
        'artista.tipo_artista' => 'required',
        'artista.biografia' => 'required|string',
        'artista.instagram' => 'string',
        'artista.facebook' => 'string',
        'artista.twitter' => 'string',
        'artista.spotify' => 'string',
        'artista.youtube' => 'string',
        'artista.imagen' => 'required',
    ];

    protected $listeners = [
        'updatedIntegrantes',
        'updatedAlbumes',
        'modificarArtistaConfirmado',
    ];

    protected $messages = [
        'estilosSeleccionados.required' => 'Debe seleccionar al menos un estilo que represente al artista.',
        'instagram.regex' => 'La URL ingresada no corresponde al sitio web de instagram.',
        'facebook.regex' => 'La URL ingresada no corresponde al sitio web de facebook.',
        'twitter.regex' => 'La URL ingresada no corresponde al sitio web de twitter.',
        'spotify.regex' => 'La URL ingresada no corresponde a la cuenta de spotify del artista.',
        'youtube.regex' => 'La URL ingresada no corresponde al canal de youtube del artista.',
    ];

    /**
     * Busca al artista que ha
     * sido seleccionado para modificar
     * con su respectiva id, identifica
     * los generos que pertenecen al artistas
     * segun sus estilos, luego carga todos
     * los generos musicales y agrupa los generos
     * que tiene el artista, finalmente carga
     * los integrantes
     * 
     * @param $id ID del artista a modificar
     */
    function mount($id)
    {
     
        $this->artista = Artista::find($id);

        if($this->artista->user_rut != auth()->user()->rut) {
            abort(403);
        }

        foreach ($this->artista->estilos as $estilo) {
            $generos_artista[] = $estilo->genero_id;
        }

        $this->generos = Genero::all();
        $this->generos_actuales = Genero::whereIn('id', $generos_artista)->get();
        $this->integrantes = $this->artista->integrantes;
        $this->caracteres_biografia = strlen($this->artista->biografia);
    }

    /**
     * Cada vez que un genero es seleccionado
     * o deseleccionado se limpia el arreglo de estilos
     * , se eliminan aquellos valores false por defecto, 
     * de entre los generos seleccionados se eligen
     * sus estilos musicales pero solo se entrega la diferencia
     * entre ese resultado y los estilos del artista
     */
    public function updatedGenerosSeleccionados()
    {
        $this->estilos = [];

        foreach ($this->generosSeleccionados as $index => $generoSeleccionado) {
            if ($this->generosSeleccionados[$index] == false) {
                unset($this->generosSeleccionados[$index]);
            }
        }

        $generosSeleccionados = Genero::whereIn("id", $this->generosSeleccionados)->get();

        foreach ($generosSeleccionados as $generoSeleccionado) {
            $this->estilos[] = $generoSeleccionado->estilos->diff($this->artista->estilos);
        }
    }

    /**
     * Esta function es emitidad desde nuevo integrante
     * y recibe el arreglo de integrantes actualizado
     * 
     * @param $integrantes Arreglo de integrantes actualizado
     */
    public function updatedIntegrantes(array $integrantes)
    {
        $this->integrantes = $integrantes;
    }

    /**
     * Se selecciona el disco de almacenamiento azure
     * y se elimina la imagen del artista, se
     * vacia el campo que almacena la url y se persisten
     * los cambios
     */
    public function eliminarImagenArtista()
    {
        $disk = Storage::disk("azure");
        $disk->delete($this->artista->imagen);
        $this->artista->imagen = '';
        $this->artista->save();
    }

    /**
     * Cada vez que se agrega un nuevo archivo
     * al campo imagen artista este debe ser
     * solo de tipo imagen con un maximo
     * de 1024kb
     */
    public function updatedNuevaImagen()
    {
        $imagen = $this->nuevaImagen->store("representantes/" . auth()->user()->rut . "/artistas/" . $this->artista->ART_Nombre, "azure");;
        $this->artista->imagen = $imagen;
        $this->artista->save();
    }

    /**
     * Elimina la vista previa de la nueva imagen
     * para el artista
     */
    public function eliminarNuevaImagen()
    {
        $this->nuevaImagen = '';
    }

    /**
     * Cada vez que se actualiza la biografia del artista
     * se compara la cantidad de caracteres introducidos 
     * versus el maximo permitido de 2000
     */
    public function updatedArtistaBiografia()
    {
        $this->caracteres_biografia = strlen($this->artista->biografia);
    }

    /**
     * Esta function es llamada desde Album cada vez
     * que se agrega o elimina un album
     */
    public function updatedAlbumes(array $albumes)
    {
        $this->albumes = $albumes;
    }


    /**
     * Verifica que ningun campo haya quedado vacio
     * luego de la modificacion, si no hay campos
     * vacios se emite una alerta para confirmar la accion
     * de lo contrario se despliegan los errores
     * al final de la pagina
     */
    public function validarModificarArtista()
    {
        $this->validate();
        if ($this->artista->tipo_artista == 2) {
            $this->validate([
                "integrantes" => 'required|array|min:1',
            ]);
        }
        $this->limpiarURL();
        $this->dispatchBrowserEvent("validarModificarArtista");
    }

    /**
     * Una vez que el representante ha confirmado los cambios
     * estos se utilizan para actualizar el registro
     * del artista seleccionado
     */
    public function modificarArtistaConfirmado()
    {
        $artista = $this->artista;

        $artista->save();
    }

    /**
     * Verifica que las URL cumplan
     * un cuerpo preestablecido
     */
    public function limpiarURL()
    {
        $this->validate([
            "artista.instagram" => "nullable|regex:/https:\/\/www.instagram.com/",
            "artista.facebook" => "nullable|regex:/https:\/\/www.facebook.com/",
            "artista.twitter" => "nullable|regex:/twitter.com/",
            "artista.spotify" => "nullable|regex:/https:\/\/open.spotify.com\/artist/",
        ]);

        $this->artista->instagram = preg_replace('/https:\/\/www.instagram.com/', '', $this->artista->instagram);
        $this->artista->facebook = preg_replace('/https:\/\/www.facebook.com/', '',  $this->artista->facebook);
        $this->artista->twitter = preg_replace('/https:\/\/twitter.com/', '',  $this->artista->twitter);
        $this->artista->spotify = preg_replace('/https:\/\/open.spotify.com\/artist\//', '',  $this->artista->spotify);
    }

    public function render()
    {
        return view('livewire.representante.artista.modificar.modificar-artista');
    }
}
