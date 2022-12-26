<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class FoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->unique()->name(),
            'price' => random_int(50, 100) * 1000.0,
            'available_quantity' => random_int(10, 20),
            'image' => 'download.jpg',
            'description' => fake()->text(),
        ];
    }
}
