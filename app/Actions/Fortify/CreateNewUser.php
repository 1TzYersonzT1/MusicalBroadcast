<?php

namespace App\Actions\Fortify;

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
            'telefono' => ['required', 'integer'],
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

        $usuario->roles()->sync($input["tipo_cuenta"]);

        return $usuario;
    }
}
