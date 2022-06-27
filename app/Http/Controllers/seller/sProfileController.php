<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sProfileController extends Controller
{
    function sellerDetails(){

        return view('seller/sellerProfile');
    }
}
