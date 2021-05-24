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

        alert()->success('Inscripción exitosa', $request['nombre'] . ' te has inscrito a ' . $taller->TAL_Nombre
            . ' exitosamente. Recuerda si tienes alguna duda o consulta no olvides contactarte con el organizador.')->autoClose(8000);

        return redirect()->route('talleres.index');
    }
}
