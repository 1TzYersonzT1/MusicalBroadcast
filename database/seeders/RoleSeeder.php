<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::factory()->create([
            "id" => 1,
            "nombre" => "Organizador",
        ]);

        Rol::factory()->create([
            "id" => 2,
            "nombre" => "Representante",
        ]);

        Rol::factory()->create([
            "id" => 3,
            "nombre" => "Administrador",
        ]);
    }
}
