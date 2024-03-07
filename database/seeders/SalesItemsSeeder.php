<?php

namespace Database\Seeders;

use App\Models\SaleItems;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SalesItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SaleItems::factory()->create([
            'sales_id' => 202301011,
            'product_id' => 1,
            'name' => 'Celular 1',
            'price' => 1800,
            'amount' => 1
        ]);

        SaleItems::factory()->create([
            'sales_id' => 202301011,
            'product_id' => 2,
            'name' => 'Celular 2',
            'price' => 3200,
            'amount' => 2
        ]);

    }
}
