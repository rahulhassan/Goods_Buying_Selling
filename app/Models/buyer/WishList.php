<?php

namespace App\Models\buyer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\buyer\ProductModel;

class WishList extends Model
{
    use HasFactory;
    protected $table="wishlist";
    protected $primaryKey = "w_id";

    function product()
    {
        return $this->belongsTo(ProductModel::class,'p_id','p_id');
    }
}
