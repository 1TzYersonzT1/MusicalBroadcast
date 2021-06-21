<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrumento extends Model
{
    use HasFactory;

    protected $table = 'instrumento';
    public $timestamps = false;
    protected $guarded = [];

    public function integrante() {
        return $this->belongsToMany(Integrante::class, 'instrumento_integrante', 'instrumento_id', 'integrante_rut');
    }
}
