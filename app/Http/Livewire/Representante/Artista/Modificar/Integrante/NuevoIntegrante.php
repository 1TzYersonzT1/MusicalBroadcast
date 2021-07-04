<?php

namespace App\Http\Livewire\Representante\Artista\Modificar\Integrante;

use App\Models\Instrumento;
use App\Models\Integrante;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class NuevoIntegrante extends Component
{

    // use WithFileUploads;

    // public $artista;
    // public $integrantes, $imagenIntegrante, $rutIntegrante, $nombreIntegrante,
    // $apellidosIntegrante;
    // public $instrumentos = [], $instrumentosSeleccionados = [];
    // public $integranteSeleccionado;

    // protected $listeners = [
    //     'eliminarIntegranteConfirmado',
    // ];

    // public function mount()
    // {
    //     $this->integrantes = $this->artista->integrantes;
    //     $this->instrumentos = Instrumento::all();
    // }


    // public function agregarIntegrante()
    // {
    //     $this->validate([
    //         'rutIntegrante' => 'required|string|min:8|max:9|unique:integrante,rut',
    //         'nombreIntegrante' => 'required|string|min:2|max:30',
    //         'apellidosIntegrante' => 'required|string|min:2|max:40',
    //         'imagenIntegrante' => 'required|image|mimes:jpeg,jpg,png,svg,gif',
    //         'instrumentosSeleccionados' => 'required|array|min:1',
    //     ]);

    //     $imagen = $this->imagenIntegrante->store("representantes/" . auth()->user()->rut . "/artistas/" . $this->artista->ART_Nombre . "/integrantes", "azure");

    //     $integrante = Integrante::create([
    //         "rut" => $this->rutIntegrante,
    //         "artista_id" => $this->artista->id,
    //         "nombre" => $this->nombreIntegrante,
    //         'apellidos' => $this->apellidosIntegrante,
    //         "imagen" => $imagen,
    //     ]);

    //     $this->rutIntegrante = '';
    //     $this->nombreIntegrante = '';
    //     $this->imagenIntegrante = '';
    //     $this->apellidosIntegrante = '';

    //     $integrante->instrumentos()->sync($this->instrumentosSeleccionados);
    //     $this->artista->refresh();
    //     $this->integrantes = $this->artista->integrantes;

    //     $this->instrumentosSeleccionados = [];
    // }


    // public function validarEliminarIntegrante($integrante) {
    //     $this->integranteSeleccionado = Integrante::find($integrante);
    //     $this->dispatchBrowserEvent("validarEliminarIntegrante");
    // }

    //  /**
    //  * Permite eliminar del arreglo de integrantes
    //  * al integrante seleccionado.
    //  */
    // public function eliminarIntegranteConfirmado()
    // {
    //     $disk = Storage::disk("azure");
    //     $disk->delete($this->integranteSeleccionado->imagen);
    //     $this->integranteSeleccionado->instrumentos()->delete();
    //     Integrante::where("rut", $this->integranteSeleccionado->rut)->delete();
    //     $this->artista->refresh();
    //     $this->integrantes = $this->artista->integrantes;
    // }

    public function render()
    {
        return view('livewire.representante.artista.modificar.integrante.nuevo-integrante');
    }
}
