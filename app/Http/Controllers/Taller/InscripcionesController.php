<?php

namespace App\Http\Controllers\Taller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asistente;
use App\Models\Taller;

class InscripcionesController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'nombre' => ['required', 'string', 'max:20'],
            'apellidos' => ['required', 'string', 'max:20'],
        ]);

        $asistente = Asistente::create([
            'taller_id' => $request['idTaller'],
            'nombre' => $request['nombre'],
            'apellido' => $request['apellidos'],
            'email' => $request['email'],
            'telefono' => $request['telefono'],
        ]);

        $taller = Taller::find($request["idTaller"]);
        $taller->TAL_Aforo = $taller->TAL_Aforo - 1;
        $taller->save();

        return redirect()->route("talleres.index");
    }
}
