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

    public function eventos() {
        return $this->belongsToMany(Evento::class, "artista_evento", "artista_id", "evento_id");
    }

    public function albumes() {
        return $this->hasMany(Album::class, "artista_id", "id");
    }

    public function integrantes() {
        return $this->hasMany(Integrante::class, "artista_id");
    }

    public function representante() {
        return $this->belongsTo(User::class, 'user_rut');
    }

    public function solicitud() {
        return $this->hasOne(SolicitudArtista::class, 'artista_id', 'id');
    }

    public function getImagenAttribute($value) {
        $url = explode("/", $value);
        unset($url[array_search("storage", $url)]);
        return implode("/", $url);
    }

}
