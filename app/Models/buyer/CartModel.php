<?php

namespace App\Models\buyer;
use App\Models\buyer\ProductModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;
    protected $table="cart";
    protected $primaryKey = "c_id";

    function product()
    {
        return $this->belongsTo(ProductModel::class,'p_id','p_id');
    }

  
}
