<?php

namespace Database\Seeders;

use App\Modules\Order\Model\Order;
use Database\Factories\OrderFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $orderFactory->count(10)->create();
    }
}
