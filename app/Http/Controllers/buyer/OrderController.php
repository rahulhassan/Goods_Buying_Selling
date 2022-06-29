<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\buyer\CartModel;
use App\Models\buyer\OrderModel;
use App\Models\buyer\ProductModel;
use App\Models\buyer\BuyerModel;

class OrderController extends Controller
{
    //
    

    function placeOrderSubmit(Request $req)
    {
        $this->validate($req,
        [
           
            "name"=>"required",
            "phone"=>"required",
            "address"=>"required",
            "payment"=>"required"       
        ],
        [
          "name.required"=>" *Provide Your Name",
          "phone.required"=>"*Provide Phone Number",
          "address.required"=>"*Provide Your Address",     
        ]);
        $products=ProductModel::where('p_title',$req->title)->first();
        //$buyer=BuyerModel::where('b_id',session()->get('LoggedIn'))->first();
       
        $order=new OrderModel();
        $order->b_name=$req->name;
        $order->b_phn=$req->phone;
        $order->b_add=$req->address;
        $order->payment_method=$req->payment;
        $order->status="pending";

        $order->p_title=$products->p_title;
        $order->p_price=$products->p_price;
        $order->p_quantity=$products->p_quantity;
        $order->p_image=$products->image_path;

        $order->save();
        session()->flash("added","Added into cart");
        return back();
    }



//_________________________________________________

  
    function addToCartSubmit(Request $req)
    {
        if($req->session()->has("LoggedIn"))
        {
          
            $cart=new CartModel();
            $cart->b_id=$req->session()->get("LoggedIn");
            $cart->p_id=$req->p_id;
            $cart->save();
            session()->flash("added","Added into cart");
            return back();
        }
        else
        {
            return redirect()->route('buyer.other.login');
        }
       
    }




    //___________________________________________


    function orders()
    {
        $buyer=BuyerModel::where('b_id',session()->get('LoggedIn'))->first();
        $orders=OrderModel::where('b_name',$buyer->b_name)->paginate(4);
        return view('buyer.other.orders')
                    ->with('orders',$orders);

    }
}
