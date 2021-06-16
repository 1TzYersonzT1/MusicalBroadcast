<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = "album";
    public $timestamps = false;
    protected $guarded = [];

    public function artista() {
        return $this->belongsTo(Artista::class, "artista_id");
    }

    public function canciones() {
        return $this->hasMany(Cancion::class, 'album_id');
    }

}
