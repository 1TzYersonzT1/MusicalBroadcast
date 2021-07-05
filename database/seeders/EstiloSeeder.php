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
            ->count(41)
            ->state(new Sequence(
                ["EST_Nombre" => 'Surf rock', 'genero_id' => 1],
                ["EST_Nombre" => 'Folk rock', 'genero_id' => 1],
                ["EST_Nombre" => 'Rock psicodélico', 'genero_id' => 1],
                ["EST_Nombre" => 'Punk rock', 'genero_id' => 1],
                ["EST_Nombre" => 'Rock industrial', 'genero_id' => 1],
                ["EST_Nombre" => 'Rock progresivo', 'genero_id' => 1],
                ["EST_Nombre" => 'Rock alternativo', 'genero_id' => 1],
                ["EST_Nombre" => 'Rock cristiano', 'genero_id' => 1],
                ["EST_Nombre" => 'Indie', 'genero_id' => 1],
                ["EST_Nombre" => 'Garage', 'genero_id' => 1],
                ["EST_Nombre" => 'Trap', 'genero_id' => 2],
                ["EST_Nombre" => 'Reguetón', 'genero_id' => 2],
                ["EST_Nombre" => 'Rap', 'genero_id' => 2],
                ["EST_Nombre" => 'Hip-Hop', 'genero_id' => 2],
                ["EST_Nombre" => 'Pop rock', 'genero_id' => 3],
                ["EST_Nombre" => 'Pop punk', 'genero_id' => 3],
                ["EST_Nombre" => 'Folk pop', 'genero_id' => 3],
                ["EST_Nombre" => 'K-pop', 'genero_id' => 3],
                ["EST_Nombre" => 'Techno', 'genero_id' => 4],
                ["EST_Nombre" => 'Dance', 'genero_id' => 4],
                ["EST_Nombre" => 'House', 'genero_id' => 4],
                ["EST_Nombre" => 'Dubstep', 'genero_id' => 4],
                ["EST_Nombre" => 'Metal progresivo', 'genero_id' => 5],
                ["EST_Nombre" => 'Black metal', 'genero_id' => 5],
                ["EST_Nombre" => 'Death metal', 'genero_id' => 5],
                ["EST_Nombre" => 'Folk metal', 'genero_id' => 5],
                ["EST_Nombre" => 'Metalcore', 'genero_id' => 5],
                ["EST_Nombre" => 'Noifolklore', 'genero_id' => 6],
                ["EST_Nombre" => 'Cueca', 'genero_id' => 6],
                ["EST_Nombre" => 'Bachata', 'genero_id' => 7],
                ["EST_Nombre" => 'Cumbia', 'genero_id' => 7],
                ["EST_Nombre" => 'Bolero', 'genero_id' => 7],
                ["EST_Nombre" => 'Tropical', 'genero_id' => 7],
                ["EST_Nombre" => 'Salsa', 'genero_id' => 7],
                ["EST_Nombre" => 'Jazz', 'genero_id' => 8],
                ["EST_Nombre" => 'Blues', 'genero_id' => 8],
                ["EST_Nombre" => 'Reggae', 'genero_id' => 8],
                ["EST_Nombre" => 'Folklore', 'genero_id' => 8],
                ["EST_Nombre" => 'Música clásica', 'genero_id' => 8],
                ["EST_Nombre" => 'Country', 'genero_id' => 8],
                ["EST_Nombre" => 'Flamenco', 'genero_id' => 8],
                ["EST_Nombre" => 'SKA', 'genero_id' => 8],
            )
        )->create();
    }
}
