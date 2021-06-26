<?php

namespace Database\Factories;

use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolFactory extends Factory
{
    /**
     * El nombre del modelo asociado a la fabrica
     * @var string
     */
    protected $model = Rol::class;

    /**
     * Define el estado por defecto de los roles
     *que se asocian a los usuarios en la aplicacion,
     *los cuales varian su estado segun las funciones
     *representadas debajo.
     * @return array
     */
    public function definition()
    {
        return [
            "id" => '',
            "nombre" => '',
        ];
    }

    /**
     * Cambia el estado por defecto del rol a Organizador
     */
    public function organizador()
    {
        return $this->state(function (array $attributes) {
            return [
                'id' => 1,
                'nombre' => 'Organizador',
            ];
        });
    }

    /**
     * Cambia el estado por defecto del rol a Representante
     */
    public function representante()
    {
        return $this->state(function (array $attributes) {
            return [
                'id' => 2,
                'nombre' => 'Representante',
            ];
        });
    }

    /**
     * Cambia el estado por defecto del rol a Administrador
     */
    public function administrador()
    {
        return $this->state(function (array $attributes) {
            return [
                'id' => 3,
                'nombre' => 'Administrador',
            ];
        });
    }
}
