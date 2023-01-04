<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'id' => "1",
            'nombre' => "activo",
        ]);


        DB::table('estados')->insert([
            'id' => "2",
            'nombre' => "baja",
        ]);

        DB::table('estados')->insert([
            'id' => "3",
            'nombre' => "pausa",
        ]);
    }
}
