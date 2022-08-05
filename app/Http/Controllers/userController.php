<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\adminUser;
use App\Models\seller\sellerUser;
use App\Models\buyer\buyerUser;
use App\Models\employee\employeeUser;
use App\Models\seller\sellerProduct;
use Illuminate\Auth\Event\Registered;
use Illuminate\Support\Facades\Validator;
use Session;

class userController extends Controller
{

    function validateRegistration(Request $req){
        $req->validate([
            'name'=>"required|regex:/^[a-zA-Z\s\.\-]+$/",
            'email'=>"required|email|unique:users|regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,3}$/",
            'psw'=>"required", //|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
            'psw_repeat'=>"required|same:psw",
            'phone'=>"required|regex:/^[0-9]{11}+$/i",
            'address'=>"required",
            'type'=>"required"
        ],
        [
           'name.required'=>'Provide a valid name',
           'email.required'=>'Provide a valid email',
           'psw.required'=>"Password must contain upper case, lower case, number and special characters, min length 8",
           'psw_repeat.required'=>'Must enter the password again',
           'psw_repeat.same'=>'Password must match with repeat password',
           'phone.required'=>'Provide your phone number',
           'address.required'=>'Provide your address',
           "phone.regex"=> "Please provide correct phone number",
        ]);

        if($req->type == 'Buyer'){
            $user = new buyerUser();
            $user->b_name = $req->name;
            $user->b_mail = $req->email;
            $user->b_phn = $req->phone;
            $user->b_add = $req->address;
            $user->b_pass = md5($req->psw_repeat);
            $res = $user->save();

        

               

            if($res){
               return back()->with('success', 'Registration successfully done');
    
            }else{
                return back()->with('fail', 'something wrong');
            }
        }else{
            $user = new sellerUser();
            $user->s_name = $req->name;
            $user->s_mail = $req->email;
            $user->s_phn = $req->phone;
            $user->s_add = $req->address;
            $user->s_pass = md5($req->psw_repeat);
            $res = $user->save();

            if($res){
                return back()->with('success', 'Registration successfully done');
    
            }else{
                return back()->with('fail', 'something wrong');
            }
        }
    }

    function checkLogin(Request $req){
        $req->validate([
            'email'=>"required|email|regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,3}$/",
            'pass'=>"required" //|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
        ],
        [
            'pass.required'=>'Please enter the password',
            'pass.regex'=>'Password not matched'
        ]);

        $user1 = adminUser::where('a_mail', '=', $req->email)->first();
        $user2 = employeeUser::where('e_mail', '=', $req->email)->first();
        $user3 = buyerUser::where('b_mail', '=', $req->email)->first();
        $user4 = sellerUser::where('s_mail', '=', $req->email)->first();
        if($user1){
            if($req->pass == $user1->a_pass){

                return redirect()->route('admin.adminDashboard');

            }else{
                return back()->with('fail','Password incorrect');
            }

        }elseif($user2){
            if($req->pass == $user2->e_pass){

                return redirect()->route('employee.dashboard');

            }else{
                return back()->with('fail','Password incorrect');
            }
        }elseif($user3){
            if(md5($req->pass) == $user3->b_pass){
                session()->put('LoggedIn',$user3->b_id);
                session()->put('loginId',$user3->b_id);
                session()->put('LoggedInName',$user3->b_name);
                return redirect()->route('buyer.other.dashboard');

            }else{
                return back()->with('fail','Password incorrect');
            }
        }elseif($user4){
            if(md5($req->pass) == $user4->s_pass){

                $req->session()->put('loginId',$user4->s_id);
                $req->session()->put('loginName',$user4->s_name);
                $req->session()->put('profilePhoto',$user4->s_image);
                return redirect()->route('seller.dashboard');

            }else{
                return back()->with('fail','Password Incorrect');
            }
        }else{
            return back()->with('fail','This email is not registered');
        }

    }
    function userLogout(){
            session()->flush();
            return redirect()->route('user.login');
        
    }

}
