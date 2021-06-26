<?php

namespace Database\Factories;

use App\Models\Estilo;
use App\Models\Genero;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstiloFactory extends Factory
{
    /**
     * El nombre del modelo asociado a la fabrica
     * @var string
     */
    protected $model = Estilo::class;

    /**
     * Define el estado por defecto para los estilos
     * musicales el cual puede ser sobreescrito por cualquier
     * valor de tipo cadena de caracteres que se le 
     * indique en la fabrica.
     * @return array
     */
    public function definition()
    {
        return [
            'EST_Nombre' => '',
            'genero_id' => '',
        ];
    }
}
