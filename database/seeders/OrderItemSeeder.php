<?php

namespace Database\Seeders;

use Database\Factories\OrderItemFactory;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderItemFactory = OrderItemFactory::new();
        $orderItemFactory->count(10)->create();
    }
}
