<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function tipo(){
        return $this->belongsTo(Tipo::class);
    }

    public function proveedor(){
        return $this->belongsTo(Proveedor::class);
    }

    public function distribuidor(){
        return $this->belongsTo(Distribuidor::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function estado(){
        return $this->belongsTo(Estado::class);
    }

    public function renovacion()
    {
        return $this->hasMany(Renovacion::class);
    }


}
