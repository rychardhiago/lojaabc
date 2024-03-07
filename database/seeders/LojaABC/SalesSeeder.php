<?php

namespace Database\Seeders\LojaABC;

use App\Models\LojaABC\Sales;
use Illuminate\Database\Seeder;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sales::factory()->create([
            'sales_id' => 202301011,
            'amount' => 8200
        ]);
    }
}
