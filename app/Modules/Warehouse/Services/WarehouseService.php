<?php

namespace App\Modules\Warehouse\Services;


use App\Modules\Warehouse\Model\Warehouse;

class WarehouseService
{
    public function getAllWarehouses()
    {
        $warehouses = Warehouse::all();
        return $warehouses;
    }
}
