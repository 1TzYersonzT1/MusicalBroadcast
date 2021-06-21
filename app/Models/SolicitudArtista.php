<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudArtista extends Model
{
    use HasFactory;

    protected $table = 'solicitud_artista';
    public $timestamps = false;
    public $guarded = [];

    public function artista() {
        return $this->hasOne(Artista::class, 'id', 'artista_id');
    }
}
