<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\seller\sellerUser;
use Illuminate\Support\Facades\Validator;
use Session;

class sProfileController extends Controller
{
    function sellerDetails($id){
        $seller=sellerUser::where('s_id', '=', $id)->first();

        return response()->json($seller); 
    }

    function sellerEditInfo($id){
        $data = sellerUser::where('s_id', '=', $id)->first();

        return view('seller/sPages/updateSellerInfo')->with('data', $data);
    }

    function sellerInfoUpdate(Request $req){
        
        $validator = Validator::make($req->all(),[
            //'image'=>'mimes:jpg,png',
            'name'=>"required|regex:/^[a-zA-Z\s\.\-]+$/",
            'email'=>"required|email|unique:users|regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,3}$/",
            'phone'=>"required|regex:/^[0-9]{11}+$/i",
            'address'=>"required"
        ],
        [
            'name.required'=>'Provide a valid name',
            'email.required'=>'Provide a valid email'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=> $validator->errors(),
            ]);
        }
            
    
        $data = sellerUser::find( $req->s_id);
        $data->s_name = $req->name;
        $data->s_mail = $req->email;
        $data->s_phn = $req->phone;
        $data->s_add = $req->address;

        if($req->hasFile('image')){
            $image = $req->file('image');
            $image_path = time().'_'.$req->name.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/seller'), $image_path);
            $data->s_image = $image_path;
        }

        $res = $data->save();
        if($res){
            return response()->json([
                'msg'=>'Profile info is updated!',
                'status'=>200,
            ]);
        }

        return response()->json('something wrong');

        
    }

}
