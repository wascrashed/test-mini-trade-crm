<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Modules\Warehouse\Model\Warehouse;
use App\Modules\Warehouse\Services\WarehouseService;

class WarehouseController extends Controller
{
    private  $warehouseService;

    public function __construct(WarehouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
    }
    /**
     * Get all warehouses.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $warehouses = $this->warehouseService->getAllWarehouses();
        return response()->json($warehouses);
    }
}

