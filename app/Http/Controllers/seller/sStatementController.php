<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\buyer\OrderItem;
use Session;

class sStatementController extends Controller
{
    function monthlyStatement(){
        
        $order_item = OrderItem::where([
            ['s_id', '=', Session::get('loginId')],
            ['payment_status', '=', 'confirm']
            ])->get();

        $total=0;
        foreach ($order_item as $or){
            $total += $or->order->total;
        }
        
        return view('seller/sellerStatement')
                    ->with('order_item', $order_item)
                    ->with('total', $total);
    }
}
