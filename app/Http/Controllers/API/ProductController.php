<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;


class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

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
