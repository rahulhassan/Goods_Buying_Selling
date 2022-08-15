<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\seller\sellerUser;
use App\Models\buyer\buyerUser;
use App\Models\employee\employeeUser;
use App\Models\admin\adminUser;

class Token extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $with = ['seller','buyer','employee','admin'];

    function seller(){
        return $this->belongsTo(sellerUser::class, 'user_email', 's_mail');
    }
    function buyer(){
        return $this->belongsTo(buyerUser::class, 'user_email', 'b_mail');
    }
    function employee(){
        return $this->belongsTo(employeeUser::class, 'user_email', 'e_mail');
    }
    function admin(){
        return $this->belongsTo(adminUser::class, 'user_email', 'a_mail');
    }
}

