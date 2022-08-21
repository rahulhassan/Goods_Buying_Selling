<?php
namespace App\Models\buyer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\buyer\ProductModel;
use App\Models\buyer\Order;
use App\Models\buyer\BuyerModel;
class OrderItem extends Model
{
    use HasFactory;
    protected $table="order_items";
    protected $primaryKey = "id";

    protected $with = ['product','buyer'];

    function product()
    {
        return $this->belongsTo(ProductModel::class,'p_id','p_id');
    }
    function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }
    function buyer()
    {
        return $this->belongsTo(BuyerModel::class,'b_id','b_id');
    }
    
}
