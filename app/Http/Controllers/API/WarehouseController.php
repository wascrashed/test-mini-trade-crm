<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\WarehouseResource;
use App\Services\WarehouseService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{


    public function __construct(private WarehouseService $warehouseService)
    {  }

    /**
     * Get all warehouses.
     *
     * @return : \Illuminate\Http\JsonResponse
     *
     */
    public function index(): JsonResponse
    {
        $warehouses = $this->warehouseService->getAllWarehouses();
        return response()->json(
            WarehouseResource::collection($warehouses)
        );
    }
}

