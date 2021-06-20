<?php

namespace App\Actions\Fortify;

use App\Models\HojaVida;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'rut' => ['required', 'string', 'max:9', 'unique:user'],
            'nombre' => ['required', 'string', 'max:20'],
            'apellido' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:user'],
            'tipo_cuenta' => ['required', 'array'],
            'telefono' => ['required', 'integer', "max:9"],
            'password' => $this->passwordRules(),

            //'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '', 
        ])->validate();

        $usuario = User::create(
            [
                'rut' => $input['rut'],
                'nombre' => $input['nombre'],
                'apellidos' => $input['apellido'],
                'telefono' => $input['telefono'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]
        );

        $hojavida = new HojaVida([
            "user_rut" => $usuario->rut,
            "talleres_rechazados" => 0,
            "talleres_reportados" => 0,
            "eventos_rechazados" => 0,
            "eventos_reportados" => 0, 
        ]);

        $usuario->hojavida()->save($hojavida);

        $usuario->roles()->sync($input["tipo_cuenta"]);

        return $usuario;
    }
}
