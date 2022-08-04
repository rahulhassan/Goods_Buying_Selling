<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\buyer\BuyerModel;
use Illuminate\Support\Facades\DB;

class BuyerController extends Controller
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
        $buyer=BuyerModel::where('b_id',session()->get('LoggedIn'))->first();
        return view('buyer.other.profile')
                ->with('buyer',$buyer);
    }


    //_____________________________________

    function updateProfile()
    {
        $buyer=BuyerModel::where('b_id',session()->get('LoggedIn'))->first();
        
        return view('buyer.other.updateProfile')
                ->with('buyer',$buyer);
    }

    //___________________________________________


    function updateProfileSubmit(Request $req)
    {

        $this->validate($req,

        [

            "name"=>"required|regex:/^[a-zA-Z\s\.\-]+$/i",

            "phone"=>"required|regex:/^[0-9]{11}+$/i",

            "address"=>"required",

            "pro_pic"=>"mimes:jpg,jpeg,png"

        ],

        [

            "name.required"=>" *Provide Your Name",

            "name.regex"=>"*Please provide valid name",
            "phone.required"=>"*Provide Phone Number",
            "phone.regex"=> "*Please provide valid phone number",
            "address.required"=>"*Provide Your Address", 

        ]);

       
        //$buyer=new BuyerModel();
        $buyer=BuyerModel::where('b_id',session()->get('LoggedIn'))->first();
        $imageName=$buyer->b_image;

        if($req->pro_pic==null)
        {
            $imageName== $buyer->b_image;   
        }
        else 
        {
            $imageName = time().'_'.$req->name.'.'.$req->pro_pic->extension();
            $req->pro_pic->move(public_path('buyerImages'), $imageName);
        }

    

        $affected = DB::table('buyer')
              ->where('b_id', $buyer->b_id)
              ->update(['b_name' => $req->name,
                        'b_phn' => $req->phone,
                        'b_add' => $req->address,
                        'b_image'=>$imageName]);
        // $buyer->b_id=$buyer->b_id;
        // $buyer->b_name=$req->name;
        // $buyer->b_mail=$req->email;
        // $buyer->b_phn=$req->phone;
        // $buyer->b_add=$req->address;
        // $buyer->b_image=$imageName;

        // $result=$buyer->save();
        if($affected){
            return back()->with('profileUpdated', 'Information Updated Successfully');

        }else{
            return back()->with('profileNotUpdated', 'Information not updated');
        }
        return view('buyer.other.updateProfile')
                ->with('buyer',$buyer);
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
