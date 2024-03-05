<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            ['name' => 'Luces de Navidad', 'description' => 'Luces de Navidad LED de colores.', 'price' => 15.00, 'box_id' => 1],
            ['name' => 'Adornos de Navidad', 'description' => 'Set de adornos para árbol de Navidad.', 'price' => 10.00, 'box_id' => 1],
            ['name' => 'Corona de Navidad', 'description' => 'Corona de Navidad para la puerta.', 'price' => 20.00, 'box_id' => 1],
            ['name' => 'Calcetines de Navidad', 'description' => 'Calcetines de Navidad para regalos.', 'price' => 5.00, 'box_id' => 1],
            ['name' => 'Velas de Navidad', 'description' => 'Velas aromáticas de Navidad.', 'price' => 10.00, 'box_id' => 1],
            ['name' => 'Espumillón', 'description' => 'Espumillón de colores para decoración.', 'price' => 5.00, 'box_id' => 1],
            ['name' => 'Bolas de Navidad', 'description' => 'Bolas de Navidad para decoración del árbol.', 'price' => 10.00, 'box_id' => 1],
            ['name' => 'Estrella de Navidad', 'description' => 'Estrella de Navidad para el árbol.', 'price' => 5.00, 'box_id' => 1],
            ['name' => 'Belén', 'description' => 'Belén con figuras de cerámica.', 'price' => 30.00, 'box_id' => 1],

            ['name' => 'Ratón', 'description' => 'Ratón inalámbrico con sensor óptico.', 'price' => 25.00, 'box_id' => 2],
            ['name' => 'Teclado', 'description' => 'Teclado mecánico retroiluminado.', 'price' => 70.00, 'box_id' => 2],
            ['name' => 'Disco duro', 'description' => 'Disco duro externo de 1TB.', 'price' => 50.00, 'box_id' => 2],
            ['name' => 'Monitor', 'description' => 'Monitor LED de 24 pulgadas.', 'price' => 100.00, 'box_id' => 2],
            ['name' => 'Cables USB', 'description' => 'Pack de cables USB de diferentes tipos.', 'price' => 10.00, 'box_id' => 2],
            ['name' => 'Cargador de móvil', 'description' => 'Cargador de móvil con USB-C.', 'price' => 15.00, 'box_id' => 2],
            ['name' => 'Auriculares', 'description' => 'Auriculares inalámbricos con cancelación de ruido.', 'price' => 50.00, 'box_id' => 2],
            ['name' => 'Altavoces', 'description' => 'Altavoces 2.1 con subwoofer.', 'price' => 50.00, 'box_id' => 2],
            ['name' => 'Router', 'description' => 'Router wifi con 4 antenas.', 'price' => 60.00, 'box_id' => 2],

                // Artículos para libros (box_id = 3)
            ['name' => 'Don Quijote de la Mancha', 'description' => 'Edición especial con ilustraciones, tapa dura.', 'price' => 45.00, 'box_id' => 3],
            ['name' => 'Cien años de soledad', 'description' => 'Edición de coleccionista, tapa dura.', 'price' => 50.00, 'box_id' => 3],
            ['name' => 'Historia del tiempo', 'description' => 'Stephen Hawking, tapa blanda, edición actualizada.', 'price' => 35.00, 'box_id' => 3],
            ['name' => 'El principito', 'description' => 'Edición bilingüe con ilustraciones originales, tapa dura.', 'price' => 20.00, 'box_id' => 3],
            ['name' => 'Sapiens: De animales a dioses', 'description' => 'Yuval Noah Harari, tapa blanda.', 'price' => 40.00, 'box_id' => 3],
            ['name' => '1984', 'description' => 'George Orwell, edición de coleccionista, tapa dura.', 'price' => 30.00, 'box_id' => 3],
            ['name' => 'El arte de la guerra', 'description' => 'Sun Tzu, incluye comentarios y análisis, tapa dura.', 'price' => 25.00, 'box_id' => 3],
            ['name' => 'Frankenstein', 'description' => 'Mary Shelley, edición ilustrada, tapa dura.', 'price' => 22.00, 'box_id' => 3],
            ['name' => 'Hamlet', 'description' => 'William Shakespeare, edición bilingüe, tapa dura.', 'price' => 28.00, 'box_id' => 3],
            ['name' => 'La divina comedia', 'description' => 'Dante Alighieri, ilustrada por Gustave Doré, tapa dura.', 'price' => 55.00, 'box_id' => 3],

                // Artículos para herramientas (box_id = 4)
            ['name' => 'Juego de destornilladores', 'description' => '20 piezas, incluye estrella y planos.', 'price' => 25.00, 'box_id' => 4],
            ['name' => 'Martillo de carpintero', 'description' => 'Acero forjado, mango ergonómico.', 'price' => 20.00, 'box_id' => 4],
            ['name' => 'Llave ajustable', 'description' => 'Acero inoxidable, 30 cm de longitud.', 'price' => 15.00, 'box_id' => 4],
            ['name' => 'Taladro inalámbrico', 'description' => '18V, incluye batería y cargador.', 'price' => 90.00, 'box_id' => 4],
            ['name' => 'Sierra circular', 'description' => 'Disco de 7.25 pulgadas, guía láser.', 'price' => 60.00, 'box_id' => 4],
            ['name' => 'Juego de brocas', 'description' => 'Para metal, madera y concreto, 50 piezas.', 'price' => 30.00, 'box_id' => 4],
            ['name' => 'Nivel láser', 'description' => 'Autonivelante, incluye trípode.', 'price' => 85.00, 'box_id' => 4],
            ['name' => 'Caja de herramientas', 'description' => 'Metálica, 5 compartimentos.', 'price' => 40.00, 'box_id' => 4],
            ['name' => 'Juego de llaves hexagonales', 'description' => 'Acero aleado, 25 piezas.', 'price' => 22.00, 'box_id' => 4],
            ['name' => 'Cinta métrica', 'description' => '25 metros, carcasa resistente.', 'price' => 12.00, 'box_id' => 4],
        ]);
    }
}
