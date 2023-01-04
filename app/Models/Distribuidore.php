<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribuidore extends Model
{
    use HasFactory;

    public function servicios(){
        return $this->hasMany(Servicio::class);
    }
}
