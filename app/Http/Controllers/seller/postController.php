<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\seller\sellerProduct;
use Session;

class postController extends Controller
{
    function validateSellerPost(Request $req){
        $validator = Validator::make($req->all(),[
            //'image' => 'required|mimes:jpg,png',
            'p_title'=> 'required|unique:product',
            'p_brand'=> 'required',
            'p_quantity'=> 'required',
            'p_price'=> 'required',
            'p_description'=> 'required',
            //'Category'=>'required'
        ],[
            //'image.required'=> 'Provide a product photo',
            'p_title.required'=> 'Provide a unique title',
            'p_brand.required'=> 'Provide product brand',
            'p_quantity.required'=> 'Provide product available quantity',
            'p_price.required'=> 'Provide product price',
            'p_description.required'=> 'Product description needed',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        
        // $image_path = time().'_'.$req->brand_name.'.'.$req->image->extension();
        // $req->image->move(public_path('images'), $imageName);

        
        $product = new sellerProduct();
        $product->p_title = $req->p_title;
        $product->p_brand = $req->p_brand;
        $product->p_price = $req->p_price;
        $product->p_description = $req->p_description;
        $product->p_quantity = $req->p_quantity;
        $product->Category = $req->Category;
        //$product->image_path = $image_path;
        $product->s_id = 1;
        $res = $product->save();
        if($res){
            return response()->json(["msg"=>"Success","data"=>$product]);
        }
        return response()->json(["msg"=>"Something Wrong"]);
    }




    function sellerPostUpdate(Request $req, $id){
        // $req->validate([
        //     'image' => 'mimes:jpg,png',
        //     'p_title'=> 'required',
        //     'brand_name'=> 'required',
        //     'qnty'=> 'required',
        //     'price'=> 'required',
        //     'desc'=> 'required'
        // ],
        // [
        //     'image.required'=> 'Provide a product photo',
        //     'p_title.required'=> 'Provide a unique title',
        //     'brand_name.required'=> 'Provide product brand',
        //     'qnty.required'=> 'Provide product available quantity',
        //     'price.required'=> 'Provide product price',
        //     'desc.required'=> 'Product description needed',
        // ]);

        

        $data = sellerProduct::find($id);
        $data->p_title = $req->p_title;
        $data->p_brand = $req->p_brand;
        $data->p_price = $req->p_price;
        $data->p_description = $req->p_description;
        $data->p_quantity = $req->p_quantity;
        // if($req->image){
        //     $imageName = time().'_'.$req->brand_name.'.'.$req->image->extension();
        //     $req->image->move(public_path('images'), $imageName);
        //     $data->image_path = $imageName;
        // }
        
        $res = $data->save();
        if($res){
            return response()->json('success');
        }

        return response()->json('something wrong');
    }
}
