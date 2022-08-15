<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\buyer\ProductModel;
use App\Models\buyer\CartModel;
use App\Models\buyer\WishList;
use Illuminate\Support\Facades\Validator;

class ApiProductController extends Controller
{
    //
    function dashboard()
    {
       
        $products=ProductModel::all();
    
       return response()->json($products);
        //return response()->json(["products"=>$products,"productId"=>$products->p_id]);
    }

    //_____________________________________


    function productDetails(Request $req)
    {
        // $products=ProductModel::where('p_title',$req->title)->first();
        // return view('buyer.other.productDetails')
        //         ->with('products',$products);
        $products=ProductModel::where('p_title',$req->title)->first();
        $total=CartModel::all()->where('b_id',17)->sum(function($t){
            return $t->p_price * $t->p_quantity;
        });
    
        $quantity=CartModel::all()->where('b_id',17)->sum('p_quantity');
        return response()->json(["products"=>$products,"total"=>$total,"quantity"=>$quantity]);
        //$products=ProductModel::where('p_title',$req->title)->first();
        //return response()->json($products);
    }


    //______________________________________

    function orderDetails(Request $req)
    {
        // $products=ProductModel::where('p_title',$req->title)->first();
        // return view('buyer.other.orderDetails')
        //         ->with('products',$products);

        $products=ProductModel::where('p_title',$req->title)->first();
        return response()->json($products);
    }

    //______________________________________


   
    function  logout()
    {
        // session()->forget('LoggedIn');
        session()->flush();
        session()->flash('logout','Logged out successfully');
        return redirect()->route('buyer.other.login');
    }

    //__________________________________________

    function search()
    {

        $search_text=$_POST['search'];
        $products=ProductModel::where('p_title','LIKE',$search_text.'%')->get();

        // return view('buyer.other.search')
        //             ->with('products',$products);
        return response()->json($products);
    }

    
    function addToWishList()
    {
        $validator = Validator::make($req->all(),[
            "p_id"=>"required",
            "b_id"=>"required",
           
        ],[
           
           
        ]);
        if($validator->fails()){
            return response()->json($validator->errors());
        }


        
            $wishlist=new WishList();
            $wishlist->b_id=17;
            $wishlist->p_id=$req->p_id;
            $wishlist->save();
            //session()->flash("added","Added into cart");
            //return back()->with("cartAdded","Product added on Cart");

            return response()->json(["wishlist"=>"Product Added On wishlist"]);

          
    }
}
