<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Evento extends Model
{
    use HasFactory;

    public $table = 'evento';
    public $timestamps = false;
    protected $guarded = [];


    public function organizador()
    {
        return $this->belongsTo(User::class, 'user_rut', 'rut');
    }

    public function solicitudes()
    {
        return $this->hasMany(SolicitudEvento::class, 'evento_id');
    }


    /**
     * Permite manipular el listado de artistas de un evento
     *
     * Este método es utilizado visualizar, agregar, modificar 
     * o eliminar artistas de un evento en particular
     * 
     *
     * @access public
     * @return Artista
     */
    public function artistas()
    {
        return $this->belongsToMany(Artista::class, "artista_evento", "evento_id", "artista_id");
    }

    public function getEVEFechaAttribute($value)
    {
        return Carbon::parse(date_create($value))->isoFormat("LL");
    }

    public function getImagenAttribute($value)
    {
        $url = explode("/", $value);
        unset($url[array_search("storage", $url)]);
        return implode("/", $url);
    }
}
