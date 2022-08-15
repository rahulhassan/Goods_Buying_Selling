<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\buyer\CartModel;
use App\Models\buyer\OrderModel;
use App\Models\buyer\ProductModel;
use App\Models\buyer\BuyerModel;
use App\Models\buyer\CouponModel;
use App\Models\buyer\Order;
use App\Models\buyer\OrderItem;
use App\Models\buyer\Shipping;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class ApiOrderController extends Controller
{
    //
    
    //___________________Order Submit______________________

    function placeOrderSubmit(Request $req)
    {
        
        
        $validator = Validator::make($req->all(),[
            
            "b_name"=>"required|regex:/^[a-zA-Z\s\.\-]+$/i",
            "b_phn"=>"required|regex:/^[0-9]{11}+$/i",
            "b_add"=>"required",
            "payment_type"=>"required",
        ],[
           
          "b_name.required"=>" *Provide Your Name",
          "b_name.regex"=>"*Please provide valid name",
          "b_phn.required"=>"*Provide Phone Number",
          "b_phn.regex"=> "*Please provide valid phone number",
          "b_add.required"=>"*Provide Your Address",
          "payment_type.required"=>"*Select Payment Method",  
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $products=ProductModel::where('p_title',$req->title)->first();
        $buyer=BuyerModel::where('b_id',17)->first();
       
        $order_id=Order::insertGetId([
            'b_id'=>$buyer->b_id,
            'payment_type'=>$req->payment_type,
            'sub_total'=>$products->p_price,
            'discount'=>0,
            'total'=>$products->p_price,
            'created_at'=>Carbon::Now(),
            'updated_at'=>Carbon::Now()

        ]);


   
            $order_item=OrderItem::insert([
                'order_id'=>$order_id,
                'p_id'=>$products->p_id,
                'p_quantity'=>1,
                's_id'=>$products->s_id,
                'b_id'=>$buyer->b_id,
                'payment_status'=>'pending',
                'created_at'=>Carbon::Now(),
                'updated_at'=>Carbon::Now()
            ]);
   
        //$buyer=BuyerModel::where('b_id',session()->get('LoggedIn'))->first();

        $Shipping=Shipping::insert([
            'order_id'=>$order_id,
            'b_name'=>$req->b_name,
            'b_phn'=>$req->b_phn,
            'b_add'=>$req->b_add,
            'created_at'=>Carbon::Now(),
            'updated_at'=>Carbon::Now()
        ]);

        return response()->json(["msg"=>"Order has been completed successfully"]);

        //return back()->with("orderPlaced"," Your Order has been completed");

        //return redirect()->route('buyer.other.orderCompleted')->with("orderPlaced"," Your Order has been completed");



    }



//_________________________Add to cart________________________

    function addToCart()
    {
        // $cart=CartModel::where('b_id',session()->get('LoggedIn'))->latest()->get();
        // $sub_total=CartModel::all()->where('b_id',session()->get('LoggedIn'))->sum(function($t){
        //     return $t->p_price * $t->p_quantity;
        // });
        // return view('buyer.other.cart')
        //             ->with('carts',$cart)
        //             ->with('sub_total',$sub_total);

        $cart=CartModel::with('product')->where('b_id',17)->latest()->get();
        $sub_total=CartModel::all()->where('b_id',17)->sum(function($t){
            return $t->p_price * $t->p_quantity;
        });
        return response()->json(["cart"=>$cart,"sub_total"=>$sub_total]);
    }
  

    //_____________________Add to Cart Submit______________________

    function addToCartSubmit(Request $req)
    {
        $validator = Validator::make($req->all(),[
            "p_id"=>"required",
            "p_price"=>"required",
            "s_id"=>"required",
        ],[
           
           
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }




          $check=CartModel::where('p_id',$req->p_id)->where('b_id',17)->first();
          if($check)
          {
            CartModel::where('p_id',$req->p_id)->where('b_id',17)->increment('p_quantity');
            //return back()->with("cartAdded","Product added on Cart");
            return response()->json(["msg"=>"Product Added On Cart"]);
          }
          else
          {
            $cart=new CartModel();
            $cart->b_id=17;
            $cart->p_id=$req->p_id;
            $cart->p_price=$req->p_price;
            $cart->p_quantity=1;
            $cart->s_id=$req->s_id;
            $cart->save();
            //session()->flash("added","Added into cart");
            //return back()->with("cartAdded","Product added on Cart");

            return response()->json(["msg"=>"Product Added On Cart"]);

          }
           
       
       
    }


    //_________________Cart Destroy______________________


    function destroy($c_id)
    {
       $data= CartModel::where('c_id',$c_id)->where('b_id',17);

        if($data){
            $data->delete();
            return response()->json([
                "status"=>200,
                "message" => "Product Deleted From Cart"
            ]);
        }else{
            return response()->json([
                "status"=>404,
                "message"=>"No Product found"
            ]);
        }
    }

    //_______________________Cart Quantity Update________________________


    function cartQuantityUpdate(Request $req,$c_id)
    {
        CartModel::where('c_id',$c_id)->where('b_id',session()->get('LoggedIn'))->update([
                'p_quantity'=>$req->p_quantity,
        ]);
        return back()->with("cartQuantityUpdated","Quantity Updated");

    }


    //____________________________________________________________________

    function updateCartQuantity($cart_id,$scope)
    {
            $cart_item=CartModel::where('c_id',$cart_id)->where('b_id',17)->first();
            if($cart_item)
            {
                if($scope== "inc")
                {
                    $cart_item->p_quantity += 1 ;
                }
                else if($scope== "dec")
                {
                    $cart_item->p_quantity -= 1 ;
                }
                $cart_item->update();
                return response()->json([
                    "status"=>200,
                    "message"=>"Quantity Updated"
                ]);
            }
            else
            {
                return response()->json([
                    "status"=>401,
                    "message"=>"Login to continue"
                ]);
            }
          

    }


    //_______________________Coupon Apply____________________

    function couponApply(Request $req)
    {
        
        // $validator = Validator::make($req->all(),

        // [

        //     "cpn_name"=>"required",
            
        // ],

        // [

        //     "cpn_name.required"=>" *You don't provide any coupon",
           
        // ]);

        // if($validator->fails()){
        //     return response()->json($validator->errors());
        // }



        $check=CouponModel::where('cpn_name',$req->cpn_name)->where('b_id',17)->first();
        if($check)
        {
 
            return response()->json(["msg"=>"Coupon Applied","cpn_name"=> $check->cpn_name,"discount"=> $check->discount]);
          
        }
        else
        {
            return response()->json(["msg"=>"Invalid Coupon"]);
           

        }
    }
    //___________________________Coupon Destroy______________________

    function couponDestroy()
    {
        // if(Session::has('coupon'))
        // {
        //     session()->forget('coupon');
        //     return back()->with("destroyCoupon","Coupon has been removed");
        // }


        return response()->json(["message"=>"Coupon has been removed"]);
    }
    //____________________________Checkout______________________

    function checkout()
    {
        // $cart=CartModel::where('b_id',session()->get('LoggedIn'))->latest()->get();
        $sub_total=CartModel::all()->where('b_id',17)->sum(function($t){
            return $t->p_price * $t->p_quantity;
         });
        // return view('buyer.other.checkout')
        //             ->with('carts',$cart)
        //             ->with('sub_total',$sub_total);

        $cart=CartModel::with('product')->where('b_id',17)->latest()->get();
        return response()->json(["cart"=>$cart,"sub_total"=>$sub_total]);
    }

    //_______________________________Place Order With Cart______________________________

    function placeOrder(Request $req)
    {
        // dd($req->all());
        $validator = Validator::make($req->all(),[
        

            "b_name"=>"required|regex:/^[a-zA-Z\s\.\-]+$/i",
            "b_phn"=>"required|regex:/^[0-9]{11}+$/i",
            "b_add"=>"required",
            "payment_type"=>"required", 
            "total"=>"min:2"

        ],
        [

          "b_name.required"=>" *Provide Your Name",
          "b_name.regex"=>"*Please provide valid name",
          "b_phn.required"=>"*Provide Phone Number",
          "b_phn.regex"=> "*Please provide valid phone number",
          "b_add.required"=>"*Provide Your Address",
          "payment_type.required"=>"*Select Payment Method",      
          "total.min"=>"You have no product on cart",     

        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }
    
        $order_id=Order::insertGetId([
            'b_id'=>17,
            'payment_type'=>$req->payment_type,
            'sub_total'=>$req->sub_total,
            'discount'=>$req->discount,
            'total'=>$req->total,
         
            'created_at'=>Carbon::Now(),
            'updated_at'=>Carbon::Now()

        ]);

     

        $carts=CartModel::where('b_id',17)->latest()->get();
        foreach($carts as $cart)
        {
            OrderItem::insert([
                'order_id'=>$order_id,
                'p_id'=>$cart->p_id,
                'p_quantity'=>$cart->p_quantity,
                's_id'=>$cart->s_id,
                'b_id'=>$cart->b_id,
                'payment_status'=>'pending',
                'created_at'=>Carbon::Now(),
                'updated_at'=>Carbon::Now()
            ]);
        }

        //$buyer=BuyerModel::where('b_id',session()->get('LoggedIn'))->first();

        Shipping::insert([
            'order_id'=>$order_id,
            'b_name'=>$req->b_name,
            'b_phn'=>$req->b_phn,
            'b_add'=>$req->b_add,
            'created_at'=>Carbon::Now(),
            'updated_at'=>Carbon::Now()
        ]);

        CartModel::where('b_id',17)->delete();
        return response()->json(["msg"=>"Order has been completed successfully"]);

        // if(Session::has('coupon'))
        // {
        //     session()->forget('coupon');
        //     //return back()->with("destroyCoupon","Coupon has been removed");
        // }

        // CartModel::where('b_id',session()->get('LoggedIn'))->delete();

        // //return back()->with("orderPlaced","Your Order has been completed");
        // return redirect()->route('buyer.other.orderCompleted')->with("orderPlaced","Your Order has been completed");

    }

    //__________________________________Show My Orders________________________________


    function orders()
    {
        //$order=Order::where('b_id',session()->get('LoggedIn'))->latest()->first();
        $order_item=OrderItem::with('product')->where('b_id',17)->latest()->get();
        return response()->json($order_item);

        //$buyer=BuyerModel::where('b_id',session()->get('LoggedIn'))->first();
        //$orders=OrderModel::where('b_name',$buyer->b_name)->paginate(4);
        //return view('buyer.other.orders')
        //            ->with('orders',$orders);

    }

    function ordersDelete($order_id)
    {
        // OrderItem::where('order_id',$order_id)->where('b_id',17)->delete();

    //    return response()->json(["orderDeleted"=>"Your order has been removed"]);

            $data=OrderItem::where('order_id',$order_id)->where('b_id',17);
            if($data){
                $data->delete();
                return response()->json([
                    "status"=>200,
                    "message" => "Product Deleted Successfully"
                ]);
            }else{
                return response()->json([
                    "status"=>404,
                    "message"=>"No Product found"
                ]);
            }

       //return back()->with(session()->flash("cartDeleted","Product deleted from Cart"));

    }



    //______________________________________________________________

    function orderCompleted()
    {
        return view('buyer.other.orderCompleted');
    }
}
