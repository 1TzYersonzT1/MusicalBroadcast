<?php

namespace Database\Factories;

use App\Models\Instrumento;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstrumentoFactory extends Factory
{
    /**
     * El nombre de la clase asociada a la fabrica
     *
     * @var string
     */
    protected $model = Instrumento::class;

    /**
     * Define el estado por defecto de los instrumentos
     * los cuales pueden ser sobrrescritos
     * al momento de utilizar la fabrica.
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
