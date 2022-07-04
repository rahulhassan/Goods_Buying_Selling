<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\buyer\Order;
use App\Models\buyer\OrderItem;
use Session;

class sOrderController extends Controller
{
    function orderInfo(){
        $order_item = OrderItem::where([
            ['s_id', '=', Session::get('loginId')],
            ['payment_status', '=', 'pending']
            ])->get();
       
        return view('seller/sellerOrder')->with('order_item',$order_item);
    }
    function productShip($id){

        $data = OrderItem::find($id);
        $data->payment_status = "confirm";
        $data->save();
        return redirect()->route('seller.orders');
    }
}
