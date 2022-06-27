<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sStatementController extends Controller
{
    function monthlyStatement(){

        return view('seller/sellerStatement');
    }
}
