<?php

namespace App\Models\buyer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table="product";
    // protected $primaryKey="p_id";
    // public $incrementing=true;
}
