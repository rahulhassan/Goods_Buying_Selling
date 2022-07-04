<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\buyer\Order;
use Session;

class sStatementController extends Controller
{
    function monthlyStatement(){

        $order = Order::where([
            ['payment_status', '=', 'confirm'],
            ['s_id', '=', Session::get('loginId')],
            ['shipping', '=', 'confirm']
            ])->get();
        
        $total=0;
        foreach ($order as $or){
    
            $amount= $or->sub_total;
            $total = $total+ $amount;
     
        }

        return view('seller/sellerStatement')->with('order', $order)->with('total', $total);
    }
}
