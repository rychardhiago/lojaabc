<?php

namespace Database\Seeders\LojaABC;

use App\Models\LojaABC\Products;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Products::factory()->create([
            'product_id' => 1,
            'name' => 'Celular 1',
            'price' => 1800,
            'description' => 'Lorenzo Ipsulum'
        ]);

        Products::factory()->create([
            'product_id' => 2,
            'name' => 'Celular 2',
            'price' => 3200,
            'description' => 'Lorem ipsum dolor'
        ]);

        Products::factory()->create([
            'product_id' => 3,
            'name' => 'Celular 3',
            'price' => 9800,
            'description' => 'Lorem ipsum dolor sit amet'
        ]);
    }
}
