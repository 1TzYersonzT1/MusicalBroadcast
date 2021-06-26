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
            'apellido' => ['required', 'string', 'max:40'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:user'],
            'tipo_cuenta' => ['required', 'array', 'min:0'],
            'telefono' => ['required', 'integer'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '', 
        ], ['terms.required' => 'Debe aceptar los términos y condiciones'])->validate();

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
            "talleres_aprobados" => 0,
            "eventos_rechazados" => 0,
            "eventos_aprobados" => 0, 
        ]);

        $usuario->hojavida()->save($hojavida);

        $usuario->roles()->sync($input["tipo_cuenta"]);

        return $usuario;
    }
}
