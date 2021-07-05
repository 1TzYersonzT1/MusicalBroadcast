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
        ->count(8)->state(new Sequence(
            ["GEN_Nombre" => "Rock"],
            ["GEN_Nombre" => "Urbano"],
            ["GEN_Nombre" => "Pop"],
            ["GEN_Nombre" => "Electrónica"],
            ["GEN_Nombre" => "Metal"],
            ["GEN_Nombre" => "Folklore"],
            ["GEN_Nombre" => "Latina"],
            ["GEN_Nombre" => "Otros"],
        ))->create();
    }
}
