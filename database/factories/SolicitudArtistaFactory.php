<?php

namespace Database\Factories;

use App\Models\Artista;
use App\Models\SolicitudArtista;
use Illuminate\Database\Eloquent\Factories\Factory;

class SolicitudArtistaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SolicitudArtista::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'artista_id' => '',
            "observacion" => "",
            "estado" => 0,
        ];
    }
}
