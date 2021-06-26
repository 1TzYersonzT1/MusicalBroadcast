<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instrumento;

class InstrumentoSeeder extends Seeder
{
    /**
     * Crea todos los instrumentos
     * que serán utilizados por los integrantes
     * de una banda.
     * @return void
     */
    public function run()
    {
        Instrumento::factory()->create([
            "INST_Nombre" => 'Bateria',
            'imagen' => 'https://ibb.co/Fz48nPW',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Guitarra acústica',
            'imagen' => 'https://ibb.co/prgDcwJ',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Guitarra eléctrica',
            'imagen' => 'https://ibb.co/DkBHBJq',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Teclados',
            'imagen' => 'https://ibb.co/sJPgVvJ',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Teclados',
            'imagen' => 'https://ibb.co/sJPgVvJ',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Bajo',
            'imagen' => 'https://ibb.co/rbs7wNm',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Conga',
            'imagen' => 'https://ibb.co/3Mj9rx8',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Trompeta',
            'imagen' => 'https://ibb.co/fCGgn1G',
        ]);
    }
}
