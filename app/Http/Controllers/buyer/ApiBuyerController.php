<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\buyer\BuyerModel;
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

    function profile()
    {
        $buyer=BuyerModel::where('b_id',17)->first();
        return response()->json($buyer);
    }


    //_____________________________________

    function updateProfile()
    {
        $buyer=BuyerModel::where('b_id',17)->first();
        return response()->json($buyer);
    }

    //___________________________________________


    function updateProfileSubmit(Request $req)
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

        
        if($req->hasFile('b_image')){
            $image = $req->file('b_image');
            $image_path = time().'_'.$req->b_name.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_path);
        }

        //$buyer=new BuyerModel();
        $buyer=BuyerModel::where('b_id',17)->first();
        $imageName=$buyer->b_image;

        if($req->b_image==null)
        {
            $imageName== $buyer->b_image;   
        }
        else 
        {
            $imageName = time().'_'.$req->b_name.'.'.$req->b_image->extension();
            $req->b_image->move(public_path('buyerImages'), $imageName);
        }

    

        // $affected = DB::table('buyer')
        //       ->where('b_id', $buyer->b_id)
        //       ->update(['b_name' => $req->name,
        //                 'b_phn' => $req->phone,
        //                 'b_add' => $req->address,
        //                 'b_image'=>$imageName]);

        $buyer = new BuyerModel();
        $buyer->b_name = $req->b_name;
        $buyer->b_mail = $req->b_mail;
        $buyer->b_phn = $req->b_phn;
        $buyer->b_add = $req->b_add;
        //$buyer->b_image = $imageName;
        $res = $buyer->save();       
                        

                if($res){
                    return response()->json(["msg"=>"Your Profile  Updated successfully!","status"=>200]);
                }
                return response()->json(["msg"=>"Something Wrong"]);

                
                // if($res){
                //     return response()->json(["msg"=>"Profile Updated Successfully"]);

                // }
                //return response()->json(["msg"=>"Product Added On Cart"]);

        // $buyer->b_id=$buyer->b_id;
        // $buyer->b_name=$req->name;
        // $buyer->b_mail=$req->email;
        // $buyer->b_phn=$req->phone;
        // $buyer->b_add=$req->address;
        // $buyer->b_image=$imageName;

        // $result=$buyer->save();
        // if($affected){
        //     return back()->with('profileUpdated', 'Information Updated Successfully');

        // }else{
        //     return back()->with('profileNotUpdated', 'Information not updated');
        // }
        // return view('buyer.other.updateProfile')
        //         ->with('buyer',$buyer);



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



    

    
}
