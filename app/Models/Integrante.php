<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrante extends Model
{
    use HasFactory;

    protected $table = "integrante";
    protected $primaryKey = "rut";
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $guarded = [];

    public function artista(){
        return $this->belongsTo(Artista::class, 'artista_id');
    }

    public function instrumentos() {
        return $this->belongsToMany(Instrumento::class, 'instrumento_integrante', 'integrante_rut', 'instrumento_id');
    }


}
