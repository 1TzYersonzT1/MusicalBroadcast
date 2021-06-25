<?php

namespace App\Http\Livewire\Representante\Artista;

use Livewire\Component;
use App\Models\Artista;

class ModificarArtista extends Component
{
    public $artista ;
    function mount( $id){
        $this->artista=Artista::find($id);
    }

    protected $rules = [
        'artista.ART_Nombre' => 'required|string',
        'artista.tipo_artista'=>'required',
        
    ];

    public function render()
    {
        return view('livewire.representante.artista.modificar-artista');
    }
}
