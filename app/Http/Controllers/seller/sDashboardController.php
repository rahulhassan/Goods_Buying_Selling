<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\seller\sellerProduct;
use App\Models\seller\category;
use Illuminate\Support\Facades\Validator;
use Session;

class sDashboardController extends Controller
{
    function showProduct(Request $req, $id){
        $search = $req['search']?? "";
        if($search != ""){
            $productInfo = sellerProduct::where([
                ['s_id', '=', $id],
                ['p_title', 'LIKE', "%$search%"]
                ])->paginate(2);
        }else{
            $productInfo = sellerProduct::where('s_id', '=', $id)->get();           
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

    function showCategory(){
        $data = category::all();
        return response()->json($data);
    }

    function addCategory(Request $req){
        $validator = Validator::make($req->all(),[
            'category_name'=>'required',
        ],[
            'category_name.required'=> 'You must provide a category name.',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=> $validator->errors(),
            ]);
        }
        $data = new category();
        $data->category_name = $req->category_name;
        $data->save();
        return response()->json(["message"=>"Category Added"]);
    }
    
    function deleteCategory($id){
        $data = category::where('id', '=', $id)->delete();
        if($data){
            return response()->json([
                'status'=>200,
                'message' => 'Category Deleted Successfully'
            ]);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'No category found'
            ]);
        }
    }

}
