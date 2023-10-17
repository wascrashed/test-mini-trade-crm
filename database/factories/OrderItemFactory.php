<?php

namespace Database\Factories;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = OrderItem::class;

    public function definition()
    {
        return [
            'order_id' => $this->faker->numberBetween(1, 30),
            'product_id' => $this->faker->numberBetween(1, 30),
            'count' => $this->faker->numberBetween(1, 100),
        ];
    }
}
