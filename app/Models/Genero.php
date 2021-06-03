<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;

    protected $table = 'genero';
    public $timestamps = false;

    protected $guarded= [];

    public function estilos() {
        return $this->hasMany(Estilo::class, 'genero_id', 'id');
    }
}
