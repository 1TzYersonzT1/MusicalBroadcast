<?php

namespace App\Models;

use Carbon\Carbon;
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
        return $this->hasMany(SolicitudTaller::class, 'taller_id');
    }

    public function asistentes() {
        return $this->belongsToMany(Asistente::class, 'asistente_taller', 'taller_id', 'asistente_rut');
    }

    public function getTALFechaAttribute($value) {
       return Carbon::parse(date_create($value))->isoFormat("LL");
    }

    public function getTALRequisitosAttribute($value) {
        return explode(", ", $value);
    }

    public function getTALProtocoloAttribute($value) {
        return explode(", ", $value);
    }

    public function getImagenAttribute($value) {
        $url = explode("/", $value);
        unset($url[array_search("storage", $url)]);
        return implode("/", $url);
    }
}
