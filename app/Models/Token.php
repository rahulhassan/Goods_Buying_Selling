<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\seller\sellerUser;

class Token extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $with = ['seller'];

    function seller(){
        return $this->belongsTo(sellerUser::class, 'user_email', 's_mail');
    }
}

