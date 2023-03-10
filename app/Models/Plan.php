<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['nombre','tipo_id'];

    public function servicios(){
        return $this->hasMany(Servicio::class);
    }
}
