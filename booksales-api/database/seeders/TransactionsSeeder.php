<?php

namespace Database\Seeders;

use App\Models\Transactions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transactions::create([
            'order_number' => 'ORD-001',
            'customer_id' => 2,
            'book_id' => 1,
            'total_amount' => 250000.00,
        ]);

        Transactions::create([
            'order_number' => 'ORD-002',
            'customer_id' => 2,
            'book_id' => 2,
            'total_amount' => 50000.00,
        ]);
    }
}
