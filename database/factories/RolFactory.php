<?php

namespace Database\Factories;

use App\Models\Rol;
use Illuminate\Database\Eloquent\Factories\Factory;

class RolFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rol::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "id" => '',
            "nombre" => '',
        ];
    }

    public function organizador() {
        return $this->state(function (array $attributes) {
            return [
                'id' => 1,
                'nombre' => 'Organizador',
            ];
        });
    }

    public function representante() {
        return $this->state(function (array $attributes) {
            return [
                'id' => 2,
                'nombre' => 'Representante',
            ];
        });
    }

    public function administrador() {
        return $this->state(function (array $attributes) {
            return [
                'id' => 3,
                'nombre' => 'Administrador',
            ];
        });
    }
}
