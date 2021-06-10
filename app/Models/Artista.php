<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;

    protected $table = 'artista';
    public $timestamps = false;

    protected $guarded= [];

    public function estilos() {
        return $this->belongsToMany(Estilo::class, 'artista_estilo', 'artista_id', 'estilo_id');
    }

}
