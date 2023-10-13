<?php

namespace Database\Seeders;

use App\Modules\Stock\Model\Stock;
use Database\Factories\ProductFactory;
use Database\Factories\StockFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stockFactory = StockFactory::new();
        $stockFactory->count(10)->create();
    }
}
