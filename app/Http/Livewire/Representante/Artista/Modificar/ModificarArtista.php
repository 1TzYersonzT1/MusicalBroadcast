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

    public function updatedEstilosSeleccionados($seleccionados)
    {
        $this->estilosSeleccionados[] = $seleccionados;
    }

    public function updatedIntegrantes(array $integrantes)
    {
        $this->integrantes = $integrantes;
    }

    public function eliminarImagenArtista()
    {
        Storage::delete($this->artista->imagen);
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
