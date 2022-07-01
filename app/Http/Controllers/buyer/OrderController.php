<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\buyer\CartModel;
use App\Models\buyer\OrderModel;
use App\Models\buyer\ProductModel;
use App\Models\buyer\BuyerModel;
use App\Models\buyer\CouponModel;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    //
    
    //___________________Order Submit______________________

    function placeOrderSubmit(Request $req)
    {
        $this->validate($req,
        [
           
            "name"=>"required",
            "phone"=>"required",
            "address"=>"required",
            "payment"=>"required", 
            "quantity"=>"required"       
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
        $order->p_quantity=$req->quantity;
        $order->p_image=$products->image_path;

        $order->save();
        session()->flash("added","Added into cart");
        return back();
    }



//_________________________Add to cart________________________

    function addToCart()
    {
        $cart=CartModel::where('b_id',session()->get('LoggedIn'))->latest()->get();
        $sub_total=CartModel::all()->where('b_id',session()->get('LoggedIn'))->sum(function($t){
            return $t->p_price * $t->p_quantity;
        });
        return view('buyer.other.cart')
                    ->with('carts',$cart)
                    ->with('sub_total',$sub_total);
    }
  

    //_____________________Add to Cart Submit______________________

    function addToCartSubmit(Request $req)
    {
        if($req->session()->has("LoggedIn"))
        {
          $check=CartModel::where('p_id',$req->p_id)->where('b_id',$req->session()->get("LoggedIn"))->first();
          if($check)
          {
            CartModel::where('p_id',$req->p_id)->where('b_id',$req->session()->get("LoggedIn"))->increment('p_quantity');
            return back()->with("cartAdded","Product added on Cart");
          }
          else
          {
            $cart=new CartModel();
            $cart->b_id=$req->session()->get("LoggedIn");
            $cart->p_id=$req->p_id;
            $cart->p_price=$req->p_price;
            $cart->p_quantity=1;
            $cart->save();
            //session()->flash("added","Added into cart");
            return back()->with("cartAdded","Product added on Cart");

          }
           
        }
        else
        {
            return redirect()->route('buyer.other.login');
        }
       
    }


    //_________________Cart Destroy______________________


    function destroy($c_id)
    {
        CartModel::where('c_id',$c_id)->where('b_id',session()->get('LoggedIn'))->delete();

       return back()->with("cartDeleted","Product deleted from Cart");

    }

    //_______________________Cart Quantity Update________________________


    function cartQuantityUpdate(Request $req,$c_id)
    {
        CartModel::where('c_id',$c_id)->where('b_id',session()->get('LoggedIn'))->update([
                'p_quantity'=>$req->quantity,
        ]);
        return back()->with("cartQuantityUpdated","Quantity Updated");

    }


    //_______________________Coupon Apply____________________

    function couponApply(Request $req)
    {
        $check=CouponModel::where('cpn_name',$req->coupon)->first();
        if($check)
        {
            session::put('coupon',[
                'cpn_name'=> $check->cpn_name,
                'discount'=>$check->discount
            ]);
            return back()->with("validCoupon","Coupon Applied");

            //session::put('cpn_name',$check->coupon);
            //session::put('discount',$check->discount);
        }
        else
        {
            return back()->with("invalidCoupon","Invalid Coupon");

        }
    }
    //___________________________Coupon Destroy______________________

    function couponDestroy()
    {
        if(Session::has('coupon'))
        {
            session()->forget('coupon');
            return back()->with("destroyCoupon","Coupon has been removed");
        }
    }
    //____________________________Checkout______________________

    function checkout()
    {
        $cart=CartModel::where('b_id',session()->get('LoggedIn'))->latest()->get();
        $sub_total=CartModel::all()->where('b_id',session()->get('LoggedIn'))->sum(function($t){
            return $t->p_price * $t->p_quantity;
        });
        return view('buyer.other.checkout')
                    ->with('carts',$cart)
                    ->with('sub_total',$sub_total);
       
    }

    //_______________________________Place Order With Cart______________________________

    function placeOrder(Request $req)
    {
        dd($req->all());

        $order_id=Order::insertGetId([
            'b_id'=>session()->get('LoggedIn'),
            'payment_type'=>$req->payment_type,
            'sub_total'=>$req->sub_total,
            'discount'=>$req->discount,
            'total'=>$req->total,

        ]);


        $carts=CartModel::where('b_id',session()->get('LoggedIn'))->latest()->get();
        foreach($carts as $cart)
        {
            OrderItem::insert([
                'order_id'=>$order_id,
                'p_id'=>$req->$cart->p_id,
                'p_quantity'=>$cart->p_quantity
            ]);
        }
        
    }

    //__________________________________Show My Orders________________________________


    function orders()
    {
        $buyer=BuyerModel::where('b_id',session()->get('LoggedIn'))->first();
        $orders=OrderModel::where('b_name',$buyer->b_name)->paginate(4);
        return view('buyer.other.orders')
                    ->with('orders',$orders);

    }
}
