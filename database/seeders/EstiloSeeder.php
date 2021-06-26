<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Estilo;
use Illuminate\Database\Eloquent\Factories\Sequence;

class EstiloSeeder extends Seeder
{
    /**
     * Se crean los diferentes estilos musicales
     * @return void
     */
    public function run()
    {
        Estilo::factory()
            ->count(4)
            ->state(new Sequence(
                ["EST_Nombre" => 'Rock Progresivo', 'genero_id' => 1],
                ["EST_Nombre" => 'Rock Alternativo', 'genero_id' => 1],
                ["EST_Nombre" => 'Old School', 'genero_id' => 4],
                ["EST_Nombre" => 'Nu Metal', 'genero_id' => 3],
            )
        )->create();
    }
}
