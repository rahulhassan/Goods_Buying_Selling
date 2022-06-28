<?php

namespace App\Http\Controllers\buyer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\buyer\BuyerModel;

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

        if($buyer)
        {
            session()->put('LoggedIn',$buyer->b_mail);
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
        $buyer=BuyerModel::where('b_mail',session()->get('LoggedIn'))->first();
        return view('buyer.other.profile')
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
