<?php

namespace Database\Seeders;

use App\Modules\Warehouse\Model\Warehouse;
use Database\Factories\WarehouseFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
