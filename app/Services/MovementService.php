<?php

namespace App\Services;

use App\Models\Movement;

class MovementService
{
    public function createMovement($product_id, $warehouse_id, $quantity, $type)
    {
        return Movement::create([
            'product_id' => $product_id,
            'warehouse_id' => $warehouse_id,
            'quantity' => $quantity,
            'type' => $type,
        ]);
    }

    public function getMovementsWithFilters($filters, $perPage)
    {
        $query = Movement::query();

        if (isset($filters['product_id'])) {
            $query->where('product_id', $filters['product_id']);
        }

        if (isset($filters['warehouse_id'])) {
            $query->where('warehouse_id', $filters['warehouse_id']);
        }

        if (isset($filters['start_date']) && isset($filters['end_date'])) {
            $query->whereBetween('created_at', [$filters['start_date'], $filters['end_date']]);
        }

        $query->orderBy('created_at', 'desc');

        return $query->paginate($perPage);
    }
}
