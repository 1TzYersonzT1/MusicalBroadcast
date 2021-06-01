<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitudTaller extends Model
{
    use HasFactory;

    protected $table = 'solicitud_taller';
    public $timestamps = false;
    protected $guarded = [];

    public function taller() {
        return $this->belongsTo(Taller::class, 'taller_id', 'id');
    }
}
