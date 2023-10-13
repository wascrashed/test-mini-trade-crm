<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Modules\Warehouse\Model\Warehouse;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Warehouse::all();
        return response()->json($warehouses);
    }
}

