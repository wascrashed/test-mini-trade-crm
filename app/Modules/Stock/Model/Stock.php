<?php

namespace App\Modules\Stock\Model;

use App\Modules\Product\Model\Product;
use App\Modules\Warehouse\Model\Warehouse;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;


    public function products()
    {
        return $this->BelongsToMany(Product::class);
    }
    public function warehouses()
    {
        return $this->BelongsToMany(Warehouse::class);
    }
}
