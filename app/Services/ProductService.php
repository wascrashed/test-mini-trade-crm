<?php

namespace App\Services;


use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    /**
     * Get all products with their stocks.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllProducts(): Collection
    {
        $products = Product::with('stocks')->get();
        return $products;
    }



}
