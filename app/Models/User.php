<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table = 'user';
    protected $primaryKey = "rut";
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'rut',
        'nombre',
        'apellidos',
        'email',
        'telefono',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

 
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles() {
        return $this->belongsToMany(Rol::class, 'rol_user', 'user_rut', 'rol_id');
    }

    public function is_organizador() {
        return $this->roles()->find(1) ? true : false;
    }

    public function is_representante() {
        return $this->roles()->find(2) ? true : false;
    }

    public function is_administrador() {
        return $this->roles()->find(3) ? true : false;
    }
    

}
