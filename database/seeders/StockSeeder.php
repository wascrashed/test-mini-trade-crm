<?php

namespace Database\Seeders;

use Database\Factories\StockFactory;
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
