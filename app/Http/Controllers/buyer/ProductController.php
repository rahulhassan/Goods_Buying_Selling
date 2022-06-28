<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\buyer\ProductModel;

class ProductController extends Controller
{
    //
    function dashboard()
    {
        $products=ProductModel::paginate(4);
        return view('buyer.other.dashboard')
                    ->with('products',$products);
    }

    //_____________________________________


    function productDetails(Request $req)
    {
        $products=ProductModel::where('p_title',$req->title)->first();
        return view('buyer.other.productDetails')
                ->with('products',$products);
    }


    //______________________________________

    function orderDetails(Request $req)
    {
        $products=ProductModel::where('p_title',$req->title)->first();
        return view('buyer.other.orderDetails')
                ->with('products',$products);
    }

    //______________________________________


   
    function  logout()
    {
        // session()->forget('LoggedIn');
        session()->flush();
        session()->flash('logout','Logged out successfully');
        return redirect()->route('buyer.other.login');
    }
}
