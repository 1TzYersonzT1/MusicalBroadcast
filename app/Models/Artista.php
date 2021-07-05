<?php

namespace App\Models;

use App\Http\Livewire\Representante\Artista\Modificar\ModificarArtista;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artista extends Model
{
    use HasFactory;

    protected $table = 'artista';
    public $timestamps = false;

    protected $guarded = [];

    /**
     * Corresponde a la relacion entre estilos y artista
     */
    public function estilos()
    {
        return $this->belongsToMany(Estilo::class, 'artista_estilo', 'artista_id', 'estilo_id');
    }

    /**
     * Corresponde a la relacion entre artista y los eventos
     * a los cuales puede asistir
     */
    public function eventos()
    {
        return $this->belongsToMany(Evento::class, "artista_evento", "artista_id", "evento_id");
    }

    /**
     * Corresponde a la relacion entre artista y los albumes
     * que tiene creados
     */
    public function albumes()
    {
        return $this->hasMany(Album::class, "artista_id", "id");
    }

    /**
     * Corresponde a la relacion entre artista y los integrantes
     * que tiene
     */
    public function integrantes()
    {
        return $this->hasMany(Integrante::class, "artista_id");
    }

    /**
     * Corresponde a la relacion entre artista y el usuario
     * que lo representa
     */
    public function representante()
    {
        return $this->belongsTo(User::class, 'user_rut');
    }

    /**
     * Corresponde a la relacion entre artista y la solicitud
     * que puede tener en determinado momento
     */
    public function solicitud()
    {
        return $this->hasOne(SolicitudArtista::class, 'artista_id');
    }

    

}
