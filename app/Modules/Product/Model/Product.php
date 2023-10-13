<?php

namespace App\Modules\Product\Model;

use App\Modules\OrderItem\Model\OrderItem;
use App\Modules\Stock\Model\Stock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'price', 'stock'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
