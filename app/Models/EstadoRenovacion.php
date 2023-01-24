<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoRenovacion extends Model
{
    use HasFactory;

    public function renovaciones(){
        return $this->hasMany(Renovacion::class);
    }

}
