<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TiposSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert([
            'id' => "1",
            'nombre' => "dominio",
        ]);


        DB::table('tipos')->insert([
            'id' => "2",
            'nombre' => "hosting",
        ]);

        DB::table('tipos')->insert([
            'id' => "3",
            'nombre' => "microsoft",
        ]);

        DB::table('tipos')->insert([
            'id' => "4",
            'nombre' => "software eurowin",
        ]);

        DB::table('tipos')->insert([
            'id' => "5",
            'nombre' => "software SB",
        ]);

        DB::table('tipos')->insert([
            'id' => "6",
            'nombre' => "software TPV",
        ]);

        DB::table('tipos')->insert([
            'id' => "7",
            'nombre' => "certificado ssl",
        ]);

        DB::table('tipos')->insert([
            'id' => "8",
            'nombre' => "mantenimiento web",
        ]);

        DB::table('tipos')->insert([
            'id' => "9",
            'nombre' => "otros",
        ]);





    }
}
