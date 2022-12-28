<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Jesús Jiménez",
            'email' => "jjimenez@controlsys.es",
            'avatar' => "defecto.png",
            'password' => Hash::make('Controlsys'),
            'rol_id' => 3,
        ]);
    }
}
