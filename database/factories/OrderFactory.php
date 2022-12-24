<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'state' => 'Đã xác nhận',
            'amount' => fake()->randomFloat(2, max: '9' * 8),
            'email' => fake()->email(),
            'address' => fake()->address(),
            'phone' => '0'.rand(100000000, 999999999),
            'name' => fake()->name(),
            'ship_rate' => fake()->randomFloat(2, max: '9' * 8),
            'tax_float' => fake()->randomFloat(2, max: '9' * 8),
            'subtotal_float' => fake()->randomFloat(2, max: '9' * 8),
            'partner_id' => 2,
            'type_id' => 2,
        ];
    }
}
