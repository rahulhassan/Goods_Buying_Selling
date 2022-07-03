<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\buyer\Order;
use Session;

class sOrderController extends Controller
{
    function orderInfo(){
        $order = Order::where([
            ['payment_status', '=', 'confirm'],
            ['s_id', '=', Session::get('loginId')],
            ['shipping', '=', 'pending']
            ])->get();

        return view('seller/sellerOrder')->with('order', $order);
    }
    function productShip($id){

        $data = Order::find($id);
        $data->shipping = "confirm";
        $data->save();
        return redirect()->route('seller.orders');
    }
}
