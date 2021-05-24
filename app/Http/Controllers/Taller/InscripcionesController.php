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

        $asistente = Asistente::updateOrCreate(
            [
                "rut" => $request["rut"],
            ],
            [
                "nombre" => $request["nombre"],
                "apellido" => $request["apellidos"],
                "email" => $request["email"],
                "telefono" => $request["telefono"]
            ]
        );

        $taller = Taller::find($request["idTaller"]);

        if (!$taller->asistentes()->find($asistente->rut)) {
            $taller->TAL_Aforo = $taller->TAL_Aforo - 1;
            $taller->asistentes()->attach($request['rut']);
            $taller->save();
            alert()->success(
                'Exito',
                $request["nombre"] . ' te has inscrito/a a ' . $taller->TAL_Nombre . ' exitosamente.'
            )->autoClose(6000);
        } else {
            alert()->info(
                'Información',
                $request["nombre"] . ' ya estás inscrito/a a este taller. Si tienes alguna duda puedes contactar al organizador.'
            )->autoClose(6000);
        }




        return redirect()->route('talleres.index');
    }
}
