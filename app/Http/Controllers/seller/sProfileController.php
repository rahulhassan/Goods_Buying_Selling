<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\seller\sellerUser;
use Session;

class sProfileController extends Controller
{
    function sellerDetails($id){
        $seller=sellerUser::where('s_id', '=', $id)->first();

        return response()->json($seller); 
    }

    function sellerEditInfo(){
        $data = sellerUser::where('s_id', '=', Session::get('loginId'))->first();

        return view('seller/sPages/updateSellerInfo')->with('data', $data);
    }

    function sellerInfoUpdate(Request $req){
        
        $req->validate([
        'name'=>"required|regex:/^[a-zA-Z\s\.\-]+$/",
        'email'=>"required|email|unique:users|regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,3}$/",
        'phone'=>"required|regex:/^[0-9]{11}+$/i",
        'address'=>"required"
        ],
        [
        'name.required'=>'Provide a valid name',
        'email.required'=>'Provide a valid email'
        ]);
    
            
    
        $data = sellerUser::find( $req->s_id);
        $data->s_name = $req->name;
        $data->s_mail = $req->email;
        $data->s_phn = $req->phone;
        $data->s_add = $req->address;

        if($req->image){
            $imageName = time().'_'.$req->name.'.'.$req->image->extension();
            $req->image->move(public_path('images/seller'), $imageName);
            $data->s_image = $imageName;
        }

        $data->save();

        return redirect()->route('seller.profile');

        
    }

}
