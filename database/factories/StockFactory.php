<?php

namespace Database\Factories;

use App\Modules\Stock\Model\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Model>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Stock::class;

    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 10),
            'warehouse_id' => $this->faker->numberBetween(1, 3),
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}
