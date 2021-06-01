<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Taller extends Model
{
    use HasFactory;

    protected $table = 'taller';
    public $timestamps = false;

    protected $guarded = [];

    public function organizador() {
        return $this->belongsTo(User::class, 'user_rut', 'rut');
    }

    public function solicitudes() {
        return $this->belongsToMany(Solicitud::class, 'solicitud_taller', 'taller_id', 'solicitud_id');
    }

    public function asistentes() {
        return $this->belongsToMany(Asistente::class, 'asistente_taller', 'taller_id', 'asistente_rut');
    }

    public function getTALHorarioAttribute($value) {
       return Carbon::parse(date_create($value))->isoFormat("LLLL");
    }

}
