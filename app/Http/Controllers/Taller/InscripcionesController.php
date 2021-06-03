<?php

namespace App\Http\Controllers\Taller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asistente;
use App\Models\Taller;
use Alert;

class InscripcionesController extends Controller
{
    public function store(Request $request)
    {
        $exito = 1;

        $asistente = Asistente::updateOrCreate(
            [
                "rut" => $request["rut"],
            ],
            [
                "nombre" => $request["nombre"],
                "apellidos" => $request["apellidos"],
                "email" => $request["email"],
                "telefono" => $request["telefono"]
            ]
        );

        $taller = Taller::find($request["idTaller"]);

        if (!$taller->asistentes()->find($asistente->rut)) {
            $taller->TAL_Aforo = $taller->TAL_Aforo - 1;
            $taller->asistentes()->attach($request['rut']);
            $taller->save();
            $exito = 2;
        } else {
            $exito = 3;
        }

        return redirect()->route('talleres.index')->with('inscripcionExitosa', $exito);
    }
}
