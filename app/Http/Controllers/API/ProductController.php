<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Modules\Product\Model\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('stocks')->get();
        return response()->json($products);
    }
}
