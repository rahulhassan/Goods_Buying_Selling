<?php

namespace App\Models\buyer;
use App\Models\buyer\CartModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table="product";
    // protected $primaryKey="p_id";
    // public $incrementing=true;

    // function cart()
    // {
    //     return $this->hasMany(CartModel::class,'p_id','p_id');
    // }
}
