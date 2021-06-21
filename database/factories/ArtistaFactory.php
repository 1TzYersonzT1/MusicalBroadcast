<?php

namespace Database\Factories;

use App\Models\Artista;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArtistaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artista::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ART_Nombre' => $this->faker->firstName . ' ' . $this->faker->lastName,
            'user_rut' => '87654321',
            'tipo_artista' => 1,
            'biografia' => $this->faker->text(200),
            'estado' => 1,
        ];
    }

    public function grupo()
    {
        return $this->state(function (array $attributes) {
            return [
                'tipo_artista' => 2,
            ];
        });
    }

    public function organizador_2() 
    {
        return $this->state(function (array $attributes) {
            return [
                "user_rut" => "12345678",
            ];
        });
    }
}
