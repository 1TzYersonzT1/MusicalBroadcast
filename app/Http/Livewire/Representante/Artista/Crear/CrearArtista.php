<?php

namespace App\Http\Livewire\Representante\Artista\Crear;


use App\Models\Genero;
use App\Models\Estilo;
use Livewire\Component;

class CrearArtista extends Component
{
    public $nombre;
    public $estilos;
    public $generos;

    protected $listeners = ['updatedEstilos'];

    public function mount()
    {
        $this->generos = Genero::all();
        $this->estilos = Estilo::all();
    }

    public function updatedEstilos(array $genero)
    {
        $this->estilos = Genero::find($genero["seleccionado"])->estilos;
        $this->dispatchBrowserEvent("onContentChanged");
    }

    public function render()
    {
        return view('livewire.representante.artista.crear.crear-artista');
    }
}
