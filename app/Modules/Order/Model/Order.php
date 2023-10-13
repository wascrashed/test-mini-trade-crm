<?php

namespace App\Modules\Order\Model;

use App\Modules\OrderItem\Model\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer',
        'completed_at',
        'status',
        'updated_at',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
