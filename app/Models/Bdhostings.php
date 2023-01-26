<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bdhostings extends Model
{
    use HasFactory;

    protected $connection = 'bdmysql';
}
