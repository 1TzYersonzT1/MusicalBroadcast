<?php

namespace App\Http\Livewire\Representante\Artista\Modificar;

use Livewire\Component;
use App\Models\Artista;
use App\Models\Genero;
use App\Models\Estilo;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class ModificarArtista extends Component
{

    use WithFileUploads;

    public $artista, $nuevaImagen, $integrantes = [];
    public $generos, $generos_actuales, $generosSeleccionados = [];
    public $estilos = [], $estilosSeleccionados = [];

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
        'updatedEstilosSeleccionados',
        'updatedIntegrantes',
        'modificarArtistaConfirmado',
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

        foreach ($this->artista->estilos as $estilo) {
            $generos_artista[] = $estilo->genero_id;
        }

        $this->generos = Genero::all();
        $this->generos_actuales = Genero::whereIn('id', $generos_artista)->get();
        $this->integrantes = $this->artista->integrantes;
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
     * Esta function es llamada desde el componente Estilo
     * el cual recibe como parametro el nuevo arreglo
     * de estilos seleccionados
     * 
     * @param $seleccionados Estilos seleccionados
     */
    public function updatedEstilosSeleccionados($seleccionados)
    {
        $this->estilosSeleccionados[] = $seleccionados;
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

    public function eliminarImagenArtista()
    {
        $this->artista->imagen = '';
        $this->artista->save();
    }

    public function updatedNuevaImagen()
    {
        $imagen = $this->nuevaImagen->store("representantes/" . auth()->user()->rut . "/artistas/" . $this->artista->ART_Nombre);
        $this->artista->imagen = 'storage/' . $imagen;
    }

    public function eliminarNuevaImagen()
    {
        $this->nuevaImagen = '';
    }


    public function validarModificarArtista()
    {
        $this->validate();
        $this->dispatchBrowserEvent("validarModificarArtista");
    }

    public function modificarArtistaConfirmado()
    {
        $imagen = $this->nuevaImagen->store("representantes/" . auth()->user()->rut . "/artistas/" . $this->artista->ART_Nombre);

        $artista = $this->artista;
        $artista->integrantes()->sync($this->integrantes);

        $artista->imagen = 'storage/' . $imagen;
        $artista->save();
    }

    public function render()
    {
        return view('livewire.representante.artista.modificar.modificar-artista');
    }
}
