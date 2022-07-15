<?php

namespace App\Models\buyer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\seller\sellerProduct;
use App\Models\buyer\buyerUser;
use App\Models\buyer\Shipping;

class Order extends Model
{
    use HasFactory;
    protected $table="orders";
    protected $primaryKey="id";

    
    // function order_item()
    // {
    //     return $this->hasMany(OrderItem::class,'order_id','id');
    // }
    function product(){
        
        return $this->belongsTo(sellerProduct::class, 'p_id', 'p_id');
    }
    function buyer(){
        
        return $this->belongsTo(buyerUser::class, 'b_id', 'b_id');
    }
    function shipping()
    {
        return $this->hasMany(Shipping::class,'order_id','id');
    }
}
