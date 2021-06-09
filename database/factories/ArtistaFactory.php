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
            'user_rut' => '192060656',
            'tipo_artista' => 0,
            'biografia' => $this->faker->text(200),
        ];
    }

    public function grupo()
    {
        return $this->state(function (array $attributes) {
            return [
                'tipo_artista' => 1,
            ];
        });
    }
}
