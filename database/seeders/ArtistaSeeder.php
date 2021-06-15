<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Artista;

class ArtistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artista::factory()->count(10)->grupo()->create();
        Artista::factory()->count(10)->grupo()->organizador_2()->create();
        
        Artista::factory()->count(10)->create();
        Artista::factory()->count(10)->organizador_2()->create();
    }
}
