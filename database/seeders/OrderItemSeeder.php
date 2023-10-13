<?php

namespace Database\Seeders;

use App\Modules\Order\Model\Order;
use App\Modules\OrderItem\Model\OrderItem;
use Database\Factories\OrderItemFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
