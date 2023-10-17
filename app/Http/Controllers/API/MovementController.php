<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovementRequest;
use App\Http\Resources\MovementResource;
use App\Services\MovementService;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    private $movementService;

    public function __construct(MovementService $movementService)
    {
        $this->movementService = $movementService;
    }

    public function index(Request $request)
    {
        $filters = [
            'product_id' => $request->input('product_id'),
            'warehouse_id' => $request->input('warehouse_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
         ];

        $perPage = $request->input('per_page', 10);

        $movements = $this->movementService->getMovementsWithFilters($filters, $perPage);

        return MovementResource::collection($movements);
    }
}
