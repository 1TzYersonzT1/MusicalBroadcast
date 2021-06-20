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

    public function evento() {
        return $this->belongsToMany(Evento::class, "artista_evento", "artista_id", "evento_id");
    }

    public function albumes() {
        return $this->hasMany(Album::class, "artista_id", "id");
    }

    public function integrantes() {
        return $this->hasMany(Integrante::class, "artista_id");
    }

}
