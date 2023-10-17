<?php

namespace Database\Seeders;

use Database\Factories\OrderFactory;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderFactory = OrderFactory::new();
        $orderFactory->count(30)->create();
    }
}
