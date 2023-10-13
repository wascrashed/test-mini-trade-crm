<?php

namespace App\Models\Modules\Order\Model;

use App\Models\Modules\OrderItem\Model\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['customer', 'status'];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
