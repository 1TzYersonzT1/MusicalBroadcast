<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Evento;

class SolicitudEvento extends Model
{
    use HasFactory;

    protected $table = 'solicitud_evento';
    public $timestamps = false;
    public $guarded = [];

    public function evento() {
        return $this->belongsTo(Evento::class, 'evento_id', 'id');
    }

}
