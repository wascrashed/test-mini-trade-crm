<?php

namespace App\Modules\Warehouse\Model;

use App\Modules\Stock\Model\Stock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    use HasFactory;

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
