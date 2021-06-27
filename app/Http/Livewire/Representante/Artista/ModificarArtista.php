<?php

namespace App\Http\Livewire\Representante\Artista;

use Livewire\Component;
use App\Models\Artista;
use App\Models\Genero;

class ModificarArtista extends Component
{
    public $artista, $generos, $generos_actuales;

    function mount( $id){

        $this->artista = Artista::find($id);

        foreach($this->artista->estilos as $estilo) {
            $generos[] = $estilo->genero_id;
        }

        $this->generos = Genero::whereNotIn('id', $generos)->get();
        $this->generos_actuales = Genero::whereIn('id', $generos)->get();
    }

    protected $rules = [
        'artista.ART_Nombre' => 'required|string',
        'artista.tipo_artista'=>'required',
        'artista.biografia' => 'required|string',
        'artista.instagram' => 'required|string',
        'artista.facebook' => 'required|string',
        'artista.twitter' => 'required|string',
        'artista.spotify' => 'required|string',
        'artista.youtube' => 'required|string',

    ];

    public function render()
    {
        return view('livewire.representante.artista.modificar-artista');
    }
}
