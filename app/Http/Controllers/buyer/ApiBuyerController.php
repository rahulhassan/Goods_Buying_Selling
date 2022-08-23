<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\buyer\BuyerModel;
use App\Models\buyer\CouponModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiBuyerController extends Controller
{
    //

    //________________________________________________





    function login()
    {
        return view('buyer.other.login');
    }

    //_______________________________________________

    function loginSubmit(Request $req)
    {
        
        $this->validate($req,
        [
           
            "email"=>"required|email",
            "password"=>"required"     
        ],
        [
           
            
        ]);


        $buyer=BuyerModel::where('b_mail',$req->email)->where('b_pass',$req->password)->first();

        // $minute=1;
        // $response=new Response();
        // $response->withCookie(cookie('b_mail',$req->email,$minute));
        // return $response;

        if($buyer)
        {
          
            session()->put('LoggedIn',$buyer->b_id);
            session()->put('LoggedInName',$buyer->b_name);
            return redirect()->route('buyer.other.dashboard');
        }
        else
        {
            session()->flash('failed','Sorry, Login Failed !!!');
            return back();
        }
    }

    //_________________________________________

    function profile($b_id)
    {
        $buyer=BuyerModel::where('b_id',$b_id)->first();
        return response()->json($buyer);
    }


    //_____________________________________

    function updateProfile($b_id)
    {
        $buyer=BuyerModel::where('b_id',$b_id)->first();
        return response()->json($buyer);
    }

    //___________________________________________


    function updateProfileSubmit(Request $req,$b_id)
    {

        $validator = Validator::make($req->all(),

        [

            "b_name"=>"required|regex:/^[a-zA-Z\s\.\-]+$/i",
            "b_phn"=>"required|regex:/^[0-9]{11}+$/i",
            "b_add"=>"required",
            // "b_image"=>"mimes:jpg,jpeg,png"

        ],

        [

            "b_name.required"=>" *Provide Your Name",

            "b_name.regex"=>"*Please provide valid name",
            "b_phn.required"=>"*Provide Phone Number",
            "b_phn.regex"=> "*Please provide valid phone number",
            "b_add.required"=>"*Provide Your Address", 

        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=> $validator->errors(),
            ]);
        }


        // if($validator->fails()){
        //     return response()->json($validator->errors());
        // }

        
        // if($req->hasFile('b_image')){
        //     $image = $req->file('b_image');
        //     $image_path = time().'_'.$req->b_name.'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path('images'), $image_path);
        // }

        //$buyer=new BuyerModel();
       //$buyer=BuyerModel::where('b_id',17)->first();
       // $imageName=$buyer->b_image;

        // if($req->b_image==null)
        // {
        //     $imageName== $buyer->b_image;   
        // }
        // else 
        // {
        //     $imageName = time().'_'.$req->b_name.'.'.$req->b_image->extension();
        //     $req->b_image->move(public_path('buyerImages'), $imageName);
        // }

        $buyer=BuyerModel::where('b_id',$b_id)->first();
        $imageName=$buyer->b_image;

        if($req->hasFile('b_image')){
            $image = $req->file('b_image');
            $imageName = time().'_'.$req->b_name.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('buyerImages'), $imageName);
        
        }
        else 
        {
            $imageName== $buyer->b_image;
        }

        $res = DB::table('buyer')
              ->where('b_id', $buyer->b_id)
              ->update(['b_name' => $req->b_name,
                        'b_phn' => $req->b_phn,
                        'b_add' => $req->b_add,
                        'b_image'=>$imageName ]);

        //  $buyer = new BuyerModel();
        // $buyer->b_name = $req->b_name;
        // $buyer->b_mail = $req->b_mail;
        // $buyer->b_phn = $req->b_phn;
        // $buyer->b_add = $req->b_add;
        //$buyer->b_image = $imageName;
        // if($req->hasFile('b_image')){
        //     $image = $req->file('b_image');
        //     $image_path = time().'_'.$req->b_name.'.'.$image->getClientOriginalExtension();
        //     $image->move(public_path('images'), $image_path);
        //     $data->b_image = $image_path;
        // }

        // $res = $buyer->save();       
                        

                if($res){
                    return response()->json(["msg"=>"Your Profile  Updated successfully!","status"=>200]);
                }
                return response()->json(["msg"=>"Something Wrong"]);

                
            


    }

    //________________________________________


    function account()
    {
        return view('buyer.other.account');
    }

    //_______________________________________


    function orders()
    {
        return view('buyer.other.orders');
    }

    function showCoupon($b_id)
    {
        $coupon=CouponModel::where("b_id",$b_id)->first();
        // return response()->json($coupon);
        if($coupon)
        {
            return response()->json(["coupon"=>$coupon,"have"=>"You have a tempted coupon"]);
        }
        else
        {
            return response()->json(["have"=>"You don't have any coupon"]);
        }
        

    }

    

    
}
