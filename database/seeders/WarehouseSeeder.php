<?php

namespace Database\Seeders;

use Database\Factories\WarehouseFactory;
use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warehouseFactory = WarehouseFactory::new();
        $warehouseFactory->count(10)->create();
    }
}
