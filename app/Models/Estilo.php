<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estilo extends Model
{
    use HasFactory;

    protected $table = 'estilo';
    public $timestamps = false;

    protected $guarded= [];

    public function genero() {
        return $this->belongsTo(Genero::class, 'genero_id');
    }
}
