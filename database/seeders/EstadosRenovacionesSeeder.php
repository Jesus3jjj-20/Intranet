<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosRenovacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('estado_renovacions')->insert([
            'id' => "1",
            'estado' => "Pendiente",
        ]);

        DB::table('estado_renovacions')->insert([
            'id' => "2",
            'estado' => "Enviado",
        ]);


        DB::table('estado_renovacions')->insert([
            'id' => "3",
            'estado' => "Enviado2",
        ]);

        DB::table('estado_renovacions')->insert([
            'id' => "4",
            'estado' => "Aceptado",
        ]);

        DB::table('estado_renovacions')->insert([
            'id' => "5",
            'estado' => "Cancelado",
        ]);

        DB::table('estado_renovacions')->insert([
            'id' => "6",
            'estado' => "Terminado",
        ]);

    }
}
