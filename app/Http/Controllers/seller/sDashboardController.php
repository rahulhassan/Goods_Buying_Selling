<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\seller\sellerProduct;
use Session;

class sDashboardController extends Controller
{
    function showProduct(Request $req){
        $search = $req['search']?? "";
        if($search != ""){
            $productInfo = sellerProduct::where([
                ['s_id', '=', Session::get('loginId')],
                ['p_title', 'LIKE', "%$search%"]
                ])->paginate(2);
        }else{
            $productInfo = sellerProduct::where('s_id', '=', Session::get('loginId'))->paginate(2);           
        }
        return view('seller/sellerDashboard')->with('productInfo', $productInfo)->with('search', $search);   
    }

    function sellerProductDelete($id){
        $data = sellerProduct::find($id);
        $data->delete();
        return redirect()->route('seller.dashboard');

    }
    function sellerUpdateShow($id){
        $data = sellerProduct::find(decrypt($id));

        return view('seller/sPages/updateProduct')->with('data', $data);
    }

}
