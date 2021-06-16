<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HojaVida extends Model
{
    use HasFactory;

    protected $table = "hoja_vida";
    public $timestamps = false;
    protected $guarded = [];

    public function usuario() {
        return $this->hasOne(User::class, "user_rut", "rut");
    }
}
