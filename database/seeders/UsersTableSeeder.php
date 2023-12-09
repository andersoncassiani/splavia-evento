<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'rony',
            'email' => 'johndoe1@example.com',
            'password' => Hash::make('rony'), // TRANSFORMA LA CONTRASEÑA NORMAL A ENCRIPTADA
        ]);

        
    }
}
