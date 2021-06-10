<?php

namespace App\Http\Livewire\Taller;

use Livewire\Component;
use App\Models\Asistente;
use App\Models\Taller;

class InscripcionTaller extends Component
{

    public $tallerSeleccionado;

    public $rut, $nombre, $apellidos, $email, $telefono;

    public function inscripcion()
    {
        $asistente = Asistente::updateOrCreate(
            [
                "rut" => $this->rut,
            ],
            [
                "nombre" => $this->nombre,
                "apellidos" => $this->apellidos,
                "email" => $this->email,
                "telefono" => $this->telefono
            ]
        );

        $taller = Taller::find($this->tallerSeleccionado->id);

        if (!$taller->asistentes()->find($asistente->rut)) {
            $taller->TAL_Aforo = $taller->TAL_Aforo - 1;
            $taller->asistentes()->attach($this->rut);
            $taller->save();
            $this->dispatchBrowserEvent('inscripcionExitosa');
        } else {
            $this->dispatchBrowserEvent('nuevoIntento');
        }
    }

    public function render()
    {
        return view('livewire.taller.inscripcion-taller');
    }
}
