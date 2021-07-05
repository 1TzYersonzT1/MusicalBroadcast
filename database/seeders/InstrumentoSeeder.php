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
            "INST_Nombre" => 'Voz',
            'imagen' => 'https://i.ibb.co/dpRGFGf/3349157-200.png',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Percusiones',
            'imagen' => 'https://i.ibb.co/M7kP9Xh/049-drums.png',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Guitarra acústica',
            'imagen' => 'https://i.ibb.co/cXP503D/050-guitar.png',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Violin',
            'imagen' => 'https://i.ibb.co/42DRGHD/048-violin.png',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Flauta',
            'imagen' => 'https://i.ibb.co/59xQYWw/047-flute.png',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Saxophone',
            'imagen' => 'https://i.ibb.co/bvc7KKF/046-saxophone.png',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Piano',
            'imagen' => 'https://i.ibb.co/CVQYXTb/045-piano.png',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Guitarra eléctrica',
            'imagen' => 'https://i.ibb.co/TRQxQfC/042-electric-guitar.png',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Cuerno frances',
            'imagen' => 'https://i.ibb.co/R9Wybt6/041-horn.png',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Armónica',
            'imagen' => ' https://i.ibb.co/dcT5ZZ1/033-harmonica.png',
        ]);
    
        Instrumento::factory()->create([
            "INST_Nombre" => 'Teclados',
            'imagen' => 'https://i.ibb.co/Hp2KHDp/019-keyboard.png',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Bajo',
            'imagen' => 'https://i.ibb.co/8zcK7t0/016-bass.png',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Contra bajo',
            'imagen' => 'https://i.ibb.co/qj4vYSD/035-double-bass.png',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Trompeta',
            'imagen' => ' https://i.ibb.co/55x0nMx/034-trumpet.png',
        ]);

        Instrumento::factory()->create([
            "INST_Nombre" => 'Trombón',
            'imagen' => 'https://i.ibb.co/Km3G6ZZ/025-trombone.png',
        ]);

        // Instrumentos que deberia agregarse
        // segun necesidad
        // https: //i.ibb.co/72XkrK6/038-cello.png
        // https: //i.ibb.co/8mZpxMv/037-djembe.png
        // 
        // https: //i.ibb.co/Hp2KHDp/019-keyboard.png
        // https: //i.ibb.co/LrVyKNz/032-harp.png
        // https: //i.ibb.co/37BNM7T/031-clarinet.png
        // https: //i.ibb.co/Bsgdct1/030-bongos.png
        // https: //i.ibb.co/272dTmt/029-cymbals.png
        // https: //i.ibb.co/XWjc2nG/027-drum.png
        // https: //i.ibb.co/cFjRt67/028-mandolin.png
        // https: //i.ibb.co/Zxwz19W/026-accordion.png
        // 
        // https: //i.ibb.co/6XSqTTm/024-gong.png
        // https: //i.ibb.co/thJQt9W/023-xylophone.png
        // https: //i.ibb.co/xhVwvD8/022-bassoon.png
        // https: //i.ibb.co/3Fkkznc/021-tuba.png
        // https: //i.ibb.co/yyVVnRB/020-organ.png
    }
}
