<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\seller\sellerProduct;

class postController extends Controller
{
    function validateSellerPost(Request $req){
        $req->validate([
            'image' => 'required|mimes:jpg,png',
            'p_title'=> 'required|unique:product',
            'brand_name'=> 'required',
            'qnty'=> 'required',
            'price'=> 'required',
            'desc'=> 'required'
        ],
        [
            'image.required'=> 'Provide a product photo',
            'p_title.required'=> 'Provide a unique title',
            'brand_name.required'=> 'Provide product brand',
            'qnty.required'=> 'Provide product available quantity',
            'price.required'=> 'Provide product price',
            'desc.required'=> 'Product description needed',
        ]);
        $imageName = time().'_'.$req->brand_name.'.'.$req->image->extension();
        $req->image->move(public_path('images'), $imageName);

        $product = new sellerProduct();
        $product->p_title = $req->p_title;
        $product->p_brand = $req->brand_name;
        $product->p_price = $req->price;
        $product->p_description = $req->desc;
        $product->p_quantity = $req->qnty;
        $product->image_path = $imageName;
        $res = $product->save();
        if($res){
            return back()->with('success', 'Data Inserted');

        }else{
            return back()->with('fail', 'something wrong');
        }
        return view('seller/sellerPost');
    }
    function sellerUpdate(Request $req){
        $req->validate([
            'image' => 'mimes:jpg,png',
            'p_title'=> 'required',
            'brand_name'=> 'required',
            'qnty'=> 'required',
            'price'=> 'required',
            'desc'=> 'required'
        ],
        [
            'image.required'=> 'Provide a product photo',
            'p_title.required'=> 'Provide a unique title',
            'brand_name.required'=> 'Provide product brand',
            'qnty.required'=> 'Provide product available quantity',
            'price.required'=> 'Provide product price',
            'desc.required'=> 'Product description needed',
        ]);

        

        $data = sellerProduct::find($req->p_id);
        $data->p_title = $req->p_title;
        $data->p_brand = $req->brand_name;
        $data->p_price = $req->price;
        $data->p_description = $req->desc;
        $data->p_quantity = $req->qnty;
        if($req->image){
            $imageName = time().'_'.$req->brand_name.'.'.$req->image->extension();
            $req->image->move(public_path('images'), $imageName);
            $data->image_path = $imageName;
        }
        
        $data->save();

        return redirect()->route('seller.dashboard');
    }
}
