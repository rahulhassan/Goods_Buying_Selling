<?php

namespace App\Models\seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\seller\sellerUser;

class sellerProduct extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'p_id';

    function seller(){
       return $this->belongsTo(sellerUser::class, 's_id', 's_id');
    }
}
