<?php

namespace Database\Seeders;

use Database\Seeders\LojaABC\ProductsSeeder;
use Database\Seeders\LojaABC\SalesItemsSeeder;
use Database\Seeders\LojaABC\SalesSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(SalesSeeder::class);
        $this->call(SalesItemsSeeder::class);
    }
}
