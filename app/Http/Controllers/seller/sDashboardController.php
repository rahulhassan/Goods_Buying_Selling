<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\seller\sellerProduct;

class sDashboardController extends Controller
{
    function showProduct(){

        $productInfo = sellerProduct::all();
        if($productInfo){
            return view('seller/sellerDashboard')->with('productInfo', $productInfo);
        }else{
            return view('seller/sellerDashboard');
        }
    }

    function sellerDelete($id){
        $data = sellerProduct::find($id);
        $data->delete();
        return redirect()->route('seller.dashboard');

    }
}
