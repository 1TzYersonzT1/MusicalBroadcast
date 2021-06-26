<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rol;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Crea un unico administrador
     * @return void
     */
    public function run()
    {
        $role_administador = Rol::factory()->administrador()->make();

        User::factory()->hasAttached($role_administador, [], 'roles')->create();
    }
}
