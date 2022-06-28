<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\seller\sellerProduct;
use Session;

class sDashboardController extends Controller
{
    function showProduct(){
        if(Session::has('loginId')){
            $productInfo = sellerProduct::where('s_id', '=', Session::get('loginId'))->paginate(2);
            if($productInfo){
                return view('seller/sellerDashboard')->with('productInfo', $productInfo);
            }else{
                return view('seller/sellerDashboard')->with('empty',"You didn't post any poduct yet");
            }            
        }
        else{
            return "session invalid";
        }
    }

    function sellerDelete($id){
        $data = sellerProduct::find($id);
        $data->delete();
        return redirect()->route('seller.dashboard');

    }
    function sellerUpdateShow($id){
        $data = sellerProduct::find(decrypt($id));

        return view('seller/sPages/updateProduct')->with('data', $data);
    }
}
