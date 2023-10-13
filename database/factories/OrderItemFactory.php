<?php

namespace Database\Factories;

use App\Modules\OrderItem\Model\OrderItem;
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
            'order_id' => $this->faker->numberBetween(1, 20),
            'product_id' => $this->faker->numberBetween(1, 10),
            'count' => $this->faker->numberBetween(1, 10),
        ];
    }
}
