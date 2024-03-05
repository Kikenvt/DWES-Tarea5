<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('boxes')->insert([
            ['label' => 'Navidad', 'location' => 'Trastero'],
            ['label' => 'Electrónica', 'location' => 'Oficina'],
            ['label' => 'Libros', 'location' => 'Estantería salón'],
            ['label' => 'Herramientas', 'location' => 'Armario A'],
            // Añade tantas cajas como necesites
        ]);
    }
}
