<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
    use HasFactory;

    protected $table = 'asistente';
    protected $primaryKey = 'rut';
    public $timestamps = false;

    protected $guarded = [];

    public function talleres() {
        return $this->belongsToMany(Taller::class, 'asistente_taller', 'asistente_rut', 'taller_id');
    }
    

}
