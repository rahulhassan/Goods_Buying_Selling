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
        $order = Order::where([
            ['payment_status', '=', 'pending'],
            ['s_id', '=', Session::get('loginId')],
            ])->latest()->first();
         $order_item=OrderItem::with('product')->where('order_id',$order->id)->get();
        return view('seller/sellerOrder')->with('order', $order)->with('order_item',$order_item);
    }
    function productShip($id){

        $data = Order::find($id);
        $data->payment_status = "confirm";
        $data->save();
        return redirect()->route('seller.orders');
    }
}
