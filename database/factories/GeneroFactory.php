<?php

namespace Database\Factories;

use App\Models\Genero;
use Illuminate\Database\Eloquent\Factories\Factory;

class GeneroFactory extends Factory
{
    /**
     * El nombre del modelo asociado a la fabrica
     * @var string
     */
    protected $model = Genero::class;

    /**
     * Define el estado por defecto para los generos
     * musicales el cual puede ser sobrrescrito
     * por cualquier valor de tipo cadena de 
     * caracteres que se le indique en la fabrica
     * @return array
     */
    public function definition()
    {
        return [
            'GEN_Nombre' => '',
        ];
    }
}
