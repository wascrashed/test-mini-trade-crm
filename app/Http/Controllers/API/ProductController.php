<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;


class ProductController extends Controller
{


    public function __construct(private ProductService $productService)
    { }

    /**
     * Get all products.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $products = $this->productService->getAllProducts();
        return response()->json(
            ProductResource::collection($products)
        );
    }
}
