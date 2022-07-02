<?php

namespace App\Models\buyer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table="order_items";

    function product()
    {
        return $this->belongsTo(ProductModel::class,'p_id','p_id');
    }
}
