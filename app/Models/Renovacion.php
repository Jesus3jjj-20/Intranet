<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renovacion extends Model
{
    use HasFactory;

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function estadoRenovacion()
    {
        return $this->belongsTo(EstadoRenovacion::class);
    }


}
