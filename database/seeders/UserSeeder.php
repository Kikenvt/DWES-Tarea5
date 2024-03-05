<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Usuario 1',
                'email' => 'u1@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Puedes añadir más usuarios aquí
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Usuario 2',
                'email' => 'u2@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Puedes añadir más usuarios aquí
        ]);
        DB::table('users')->insert([
            [
                'name' => 'Usuario 3',
                'email' => 'u3@example.com',
                'password' => Hash::make('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Puedes añadir más usuarios aquí
        ]);
    }
}
