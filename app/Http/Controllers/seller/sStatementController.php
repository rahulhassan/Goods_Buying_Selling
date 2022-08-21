<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\buyer\OrderItem;
use Session;
use Carbon\Carbon;

class sStatementController extends Controller
{
    function monthlyStatement(){
        
        $order_item = OrderItem::where([
            ['s_id', '=', 1],
            ['payment_status', '=', 'confirm']
            ])->get();

        $janDate = date('Y-m-d', strtotime("2022-01-31"));
        $febDate = date('Y-m-d', strtotime("2022-02-28"));
        $marDate = date('Y-m-d', strtotime("2022-03-31"));
        $aprDate = date('Y-m-d', strtotime("2022-04-30"));
        $mayDate = date('Y-m-d', strtotime("2022-05-31"));
        $junDate = date('Y-m-d', strtotime("2022-06-30"));
        $julDate = date('Y-m-d', strtotime("2022-07-31"));
        $augDate = date('Y-m-d', strtotime("2022-08-31"));
        //$dt = Carbon::create(2022, 8, 31, 0);

        

        $jan=$feb=$mar=$apr=$may=$jun=$jul=$aug=0;
        foreach ($order_item as $or){
            if($or->updated_at <= $janDate){
                $jan += $or->order->total;

            }else if($or->updated_at<=$febDate){
                $feb += $or->order->total;
                
            }else if($or->updated_at<=$marDate){
                $mar += $or->order->total;
                
            }else if($or->updated_at<=$aprDate){
                $apr += $or->order->total;
                
            }else if($or->updated_at<=$mayDate){
                $may += $or->order->total;
                
            }else if($or->updated_at<=$junDate){
                $jun += $or->order->total;
                
            }
            else if($or->updated_at<=$julDate){
                $jul += $or->order->total;
                
            }
            else if($or->updated_at<=$augDate){
                $aug += $or->order->total;
                
            }
        }
        $total_sell = $jan+$feb+$mar+$apr+$may+$jun+$jul+$aug;
        
        return response()->json([$jan, $feb, $mar, $apr, $may, $jun, $jul, $aug, $total_sell, $order_item]);
    }
}
