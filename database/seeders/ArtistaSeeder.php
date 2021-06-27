<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artista;
use App\Models\User;
use App\Models\Rol;
use App\Models\SolicitudArtista;
use Illuminate\Database\Eloquent\Factories\Sequence;


class ArtistaSeeder extends Seeder
{
    /**
     * Se crean 2 representantes y para cada uno de ellos
     * 5 bandas y 5 solistas.
     * @return void
     */
    public function run()
    {
        $role_representante = Rol::factory()->representante()->make();

        $representante_1 = User::factory()->hasAttached($role_representante, [], 'roles')->create();

    }
}
