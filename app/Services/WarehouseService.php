<?php

namespace App\Services;


use App\Models\Warehouse;

class WarehouseService
{
    public function getAllWarehouses()
    {
        $warehouses = Warehouse::all();
        return $warehouses;
    }
}
