<?php

namespace App\Http\Livewire\Representante\Artista;

use Livewire\Component;
use App\Models\Artista;
use App\Models\Genero;
use App\Models\Estilo;

class ModificarArtista extends Component
{
    public $artista;
    public $generos, $generos_actuales, $generosSeleccionados = [];
    public $estilos = [], $estilosSeleccionados = [];
    public $auxiliar;

    protected $rules = [
        'artista.ART_Nombre' => 'required|string',
        'artista.tipo_artista' => 'required',
        'artista.biografia' => 'required|string',
        'artista.instagram' => 'required|string',
        'artista.facebook' => 'required|string',
        'artista.twitter' => 'required|string',
        'artista.spotify' => 'required|string',
        'artista.youtube' => 'required|string',
        'artista.imagen' => 'required',
    ];

    function mount($id)
    {
        $this->artista = Artista::find($id);

        foreach ($this->artista->estilos as $estilo) {
            $generos[] = $estilo->genero_id;
        }

        $this->generos = Genero::all();
        $this->generos_actuales = Genero::whereIn('id', $generos)->get();
    }

    public function updatedGenerosSeleccionados()
    {
        foreach ($this->generosSeleccionados as $index => $generoSeleccionado) {
            if ($this->generosSeleccionados[$index] == false) {
                unset($this->generosSeleccionados[$index]);
            }
        }

        $this->estilos = [];
        $this->generos = Genero::whereIn("id", $this->generosSeleccionados)->get();
    }

    public function render()
    {
        return view('livewire.representante.artista.modificar-artista');
    }
}
