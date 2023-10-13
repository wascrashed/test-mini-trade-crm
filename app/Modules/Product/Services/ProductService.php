<?php

namespace App\Modules\Product\Services;


use App\Modules\Product\Model\Product;

class ProductService
{
    public function getAllProducts()
    {
        $products = Product::with('stocks')->get();
        return $products;
    }
}
