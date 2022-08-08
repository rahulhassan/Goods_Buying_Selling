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
            'image' => 'required|mimes:jpg,png',
            'p_title'=> 'required|unique:product',
            'p_brand'=> 'required',
            'p_quantity'=> 'required',
            'p_price'=> 'required',
            'p_description'=> 'required',
        ],[
            'image.required'=> 'Provide a product photo',
            'image.mimes'=> 'Image type will be jpg or png',
            'p_title.required'=> 'Provide a unique title',
            'p_title.unique'=> 'Product title has already been taken',
            'p_brand.required'=> 'Provide product brand',
            'p_quantity.required'=> 'Provide product available quantity',
            'p_price.required'=> 'Provide product price',
            'p_description.required'=> 'Product description needed',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=> $validator->errors(),
            ]);
        }
        
        if($req->hasFile('image')){
            $image = $req->file('image');
            $image_path = time().'_'.$req->p_brand.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_path);
        }
        

        
        $product = new sellerProduct();
        $product->p_title = $req->p_title;
        $product->p_brand = $req->p_brand;
        $product->p_price = $req->p_price;
        $product->p_description = $req->p_description;
        $product->p_quantity = $req->p_quantity;
        $product->Category = $req->Category;
        $product->image_path = $image_path;
        $product->s_id = 1;
        $res = $product->save();
        if($res){
            return response()->json(["msg"=>"Your Product posted successfully!","status"=>200]);
        }
        return response()->json(["msg"=>"Something Wrong"]);
    }




    function sellerPostUpdate(Request $req, $id){
        $validator = Validator::make($req->all(),[
            //'image' => 'mimes:jpg,png',
            'p_title'=> 'required',
            'p_brand'=> 'required',
            'p_quantity'=> 'required',
            'p_price'=> 'required',
            'p_description'=> 'required',
        ],[
            //'image.mimes'=> 'Image type will be jpg or png',
            'p_title.required'=> 'Provide a unique title',
            'p_brand.required'=> 'Provide product brand',
            'p_quantity.required'=> 'Provide product available quantity',
            'p_price.required'=> 'Provide product price',
            'p_description.required'=> 'Product description needed',
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=> $validator->errors(),
            ]);
        }
        
        $data = sellerProduct::find($id);
        $data->p_title = $req->p_title;
        $data->p_brand = $req->p_brand;
        $data->p_price = $req->p_price;
        $data->p_description = $req->p_description;
        $data->p_quantity = $req->p_quantity;
        $data->Category = $req->Category;
        if($req->hasFile('image')){
            $image = $req->file('image');
            $image_path = time().'_'.$req->p_brand.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_path);
            $data->image_path = $image_path;
        }
        
        // if($req->image){
        //     $imageName = time().'_'.$req->brand_name.'.'.$req->image->extension();
        //     $req->image->move(public_path('images'), $imageName);
        //     $data->image_path = $imageName;
        // }
        
        $res = $data->save();
        if($res){
            return response()->json([
                'msg'=>'Product is updated!',
                'status'=>200,
            ]);
        }

        return response()->json('something wrong');
    }
}
