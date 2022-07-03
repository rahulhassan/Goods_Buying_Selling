<?php

namespace App\Models\seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sellerUser extends Model
{
    use HasFactory;
    protected $table = 'seller';
    protected $primaryKey = 's_id';

}
