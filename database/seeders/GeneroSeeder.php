<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genero;
use Illuminate\Database\Eloquent\Factories\Sequence;

class GeneroSeeder extends Seeder
{
    /**
     * Se crean los generos musicales
     * @return void
     */
    public function run()
    {
        Genero::factory()
        ->count(5)->state(new Sequence(
            ["GEN_Nombre" => "Rock"],
            ["GEN_Nombre" => "Folclor"],
            ["GEN_Nombre" => "Metal"],
            ["GEN_Nombre" => "Hip-Hop"],
            ["GEN_Nombre" => "Pop"],
        ))->create();
    }
}
