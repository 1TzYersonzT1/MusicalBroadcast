<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;

class RoleSeeder extends Seeder
{
    /**
     * Crea los 3 roles que seran
     * asignados a los distintos usuarios
     * @return void
     */
    public function run()
    {
        Rol::factory()->organizador()->create();
        Rol::factory()->representante()->create();
        Rol::factory()->administrador()->create();
    }
}
