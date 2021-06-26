<?php

namespace Database\Factories;

use App\Models\Instrumento;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstrumentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instrumento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'INST_Nombre' => '',
            'imagen' => '',
        ];
    }
}
