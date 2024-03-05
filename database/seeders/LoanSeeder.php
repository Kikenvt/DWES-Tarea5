<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Loan;
use App\Models\User;
use App\Models\Item;
use Carbon\Carbon;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtén todos los usuarios
        $users = User::all();
        // Obtén todos los items
        $items = Item::all();

        foreach ($users as $user) {
            // Crea dos préstamos para cada usuario
            for ($i = 0; $i < 2; $i++) {
                // Obtén un item aleatorio
                $item = $items->random();

                $checkoutDate = Carbon::now()->subDays(rand(1, 60)); // Fecha de préstamo entre 1 y 60 días atrás
                $dueDate = $checkoutDate->copy()->addDays(14); // La devolución se debía hacer 14 días después del préstamo
                $returnedDate = $dueDate->copy()->addDays(rand(-2, 2)); // El item se devolvió entre 2 días antes y 2 días después de la fecha de devolución

                Loan::create([
                    'user_id' => $user->id,
                    'item_id' => $item->id,
                    'checkout_date' => $checkoutDate,
                    'due_date' => $dueDate,
                    'returned_date' => $returnedDate,
                ]);
            }
        }
    }
}
