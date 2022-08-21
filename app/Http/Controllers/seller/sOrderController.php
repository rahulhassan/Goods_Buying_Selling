<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\buyer\Order;
use App\Models\buyer\OrderItem;
use Session;

class sOrderController extends Controller
{
    function orderInfo($id){
        $order_item = OrderItem::where([
            ['s_id', '=', $id],
            ['payment_status', '!=', 'confirm']
            ])->get();
       
        return response()->json($order_item);
    }
    function productShip($id){

        $data = OrderItem::find($id);
        $data->payment_status = "confirm";
        $data->save();
        return response()->json(["msg"=>"Order shifted successfully", "status"=>200]);
    }
}
