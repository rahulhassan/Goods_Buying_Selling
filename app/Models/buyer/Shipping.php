<?php

namespace App\Models\buyer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\buyer\Order;

class Shipping extends Model
{
    use HasFactory;
    protected $table="shipping";
    protected $primaryKey = "s_id";

    protected $with = ['order'];
    
    function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
}
