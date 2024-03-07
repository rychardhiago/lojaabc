<?php

namespace Database\Factories\LojaABC;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LojaABC\Products>
 */
class SalesFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sales_id' => fake()->numerify(),
            'amount' => fake()->numerify()
        ];
    }
}
