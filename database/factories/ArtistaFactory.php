<?php

namespace Database\Factories;

use App\Models\Artista;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArtistaFactory extends Factory
{
    /**
     * El nombre del modelo asociado a la fabrica.
     *
     * @var string
     */
    protected $model = Artista::class;

    /**
     * Define el estado por defecto del artista
     * @return array
     */
    public function definition()
    {
        return [
            'ART_Nombre' => $this->faker->firstName . ' ' . $this->faker->lastName,
            'user_rut' => '',
            'tipo_artista' => 1,
            'biografia' => $this->faker->text(2000),
            'estado' => 1,
            'imagen' => $this->faker->imageUrl(32, 32, 'people'),
        ];
    }

    /**
     * Cambia el tipo de artista a banda. 
     * Por defecto el tipo de artista es solita.
     */
    public function banda()
    {
        return $this->state(function (array $attributes) {
            return [
                'tipo_artista' => 2,
            ];
        });
    }
}
