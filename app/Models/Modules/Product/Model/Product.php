<?php

namespace App\Models\Modules\Product\Model;

use App\Models\Modules\OrderItem\Model\OrderItem;
use App\Models\Modules\Stock\Model\Stock;
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
}
