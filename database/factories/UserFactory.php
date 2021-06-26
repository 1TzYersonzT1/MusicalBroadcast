<?php

namespace Database\Factories;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;

class UserFactory extends Factory
{
    /**
     * El nombre del modelo asociado a la fabrica
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define el estado por defecto del usuario,
     * toda la información es aleatoria exceptuando
     * la contraseña que es 123 en primera instancia.
     * Para modificarle, debe iniciar sesión en el sitio
     * web y modificar perfil.
     * @return array
     */
    public function definition()
    {
        return [
            'rut' => rand(61229361, 246779890),
            'nombre' => $this->faker->firstName('male'),
            'apellidos' => $this->faker->lastName() . " " . $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail,
            'telefono' => 123456789,
            'password' => Hash::make(123), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    /**
     * Indicate that the user should have a personal team.
     *
     * @return $this
     */
    public function withPersonalTeam()
    {
        if (! Features::hasTeamFeatures()) {
            return $this->state([]);
        }

        return $this->has(
            Team::factory()
                ->state(function (array $attributes, User $user) {
                    return ['name' => $user->name.'\'s Team', 'user_id' => $user->id, 'personal_team' => true];
                }),
            'ownedTeams'
        );
    }
}
