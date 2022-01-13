<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('utilisateurs')->insert([
            'nom_prenoms' => "Administrateur",
            'mail' => "admin@rapide-reparation.ci",
            'password' => Hash::make('password'),
            'api_token' => Str::random(60),
            'telephone' => "00000000",
            'type' => "administrateur",
        ]);
    }
}
