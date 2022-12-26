<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderLine>
 */
class OrderLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'order_id' => Order::factory(),
            'food_id' => rand(1, 43),
            'food_price' => fake()->randomFloat(2, max: '9' * 8),
            'amount' => fake()->randomFloat(2, max: '9' * 8),
        ];
    }
}
