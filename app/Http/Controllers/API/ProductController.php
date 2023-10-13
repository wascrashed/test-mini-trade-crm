<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Modules\Product\Model\Product;
use App\Modules\Product\Services\ProductService;

class ProductController extends Controller
{
    private  $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }
    /**
     * Get all warehouses.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
         $products = $this->productService->getAllProducts();
        return response()->json($products);
    }
}
