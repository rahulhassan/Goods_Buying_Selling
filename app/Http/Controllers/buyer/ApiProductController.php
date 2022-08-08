<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\buyer\ProductModel;

class ApiProductController extends Controller
{
    //
    function dashboard()
    {
        // $products=ProductModel::paginate(4);
        // return view('buyer.other.dashboard')
        //             ->with('products',$products);

        $products=ProductModel::all();
        return response()->json($products);
    }

    //_____________________________________


    function productDetails(Request $req)
    {
        // $products=ProductModel::where('p_title',$req->title)->first();
        // return view('buyer.other.productDetails')
        //         ->with('products',$products);

        $products=ProductModel::where('p_title',$req->title)->first();
        return response()->json($products);
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

        return view('buyer.other.search')
                    ->with('products',$products);
    }
}
