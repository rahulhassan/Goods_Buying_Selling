<?php

namespace App\Models\seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sellerProduct extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'p_id';
}
