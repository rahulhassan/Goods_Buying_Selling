<?php

namespace App\Models\buyer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $primaryKey="id";

    
    // function order_item()
    // {
    //     return $this->hasMany(OrderItem::class,'order_id','id');
    // }
}
