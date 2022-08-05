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
                ['s_id', '=', 1],
                ['p_title', 'LIKE', "%$search%"]
                ])->paginate(2);
        }else{
            $productInfo = sellerProduct::where('s_id', '=', 1)->get();           
        }
        return response()->json($productInfo);   
    }
    function showCategoryProduct(Request $req, $ct){
        $search = $req['search']?? "";
        if($search != ""){
            $productInfo = sellerProduct::where([
                ['s_id', '=', Session::get('loginId')],
                ['p_title', 'LIKE', "%$search%"]
                ])->get();
        }else{
            $productInfo = sellerProduct::where([
                ['s_id', '=', Session::get('loginId')],
                ['Category', '=', "$ct"]
                ])->get();
        }
        return view('seller/sellerDashboard')->with('productInfo', $productInfo)->with('search', $search);   
    }

    function sellerProductDelete($id){
        $data = sellerProduct::find($id);
        if($data){
            $data->delete();
            return response()->json([
                'status'=>200,
                'message' => 'Product Deleted Successfully'
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'No Product found'
            ]);
        }

    }
    function sellerUpdateShow($id){
        $data = sellerProduct::where('p_id', '=', $id)->first();
        if($data){
            return response()->json($data);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'No Product found'
            ]);
        }
        
    }

}
