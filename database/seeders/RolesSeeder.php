<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rols')->insert([
            'id' => "1",
            'nombre' => "administrador",
            'admin' => "3",
        ]);


        DB::table('rols')->insert([
            'id' => "2",
            'nombre' => "usuario",
            'admin' => "2",
        ]);

        DB::table('rols')->insert([
            'id' => "3",
            'nombre' => "practicas",
            'admin' => "1",
        ]);

    }
}
