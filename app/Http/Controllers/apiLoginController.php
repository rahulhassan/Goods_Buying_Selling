<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datetime;
use Illuminate\Support\Str;
use App\Models\Token;
use App\Models\admin\adminUser;
use App\Models\seller\sellerUser;
use App\Models\buyer\buyerUser;
use App\Models\employee\employeeUser;
use App\Models\seller\sellerProduct;
use Illuminate\Support\Facades\Validator;

class apiLoginController extends Controller
{
    function login(Request $req){

        $validator = Validator::make($req->all(),[
            'email'=>"required|email",//|regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,3}$/"
            'pass'=>"required" //|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
        ],
        [
            'pass.required'=>'Please enter the password',
            'pass.regex'=>'Password not matched'
        ]);

        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=> $validator->errors(),
                //"msg"=>"Incorrect entry!"
            ]);
        }

        $user1 = adminUser::where('a_mail', '=', $req->email)->first();
        $user2 = employeeUser::where('e_mail', '=', $req->email)->first();
        $user3 = buyerUser::where('b_mail', '=', $req->email)->first();
        $user4 = sellerUser::where('s_mail', '=', $req->email)->first();

        $key = Str::random(40);
        $token = new Token();

        if($user1){
            if($req->pass == $user1->a_pass){

                $token->token_key = $key;
                $token->user_email = $user1->a_mail;
                $token->created_at = new Datetime();
                $token->save();
                return response()->json(["token"=>$key, "user"=>"admin"],200);

            }else{
                return response()->json(["msg"=>"Invalid username password!"]);
            }

        }else if($user2){
            if($req->pass == $user2->e_pass){

                $token->token_key = $key;
                $token->user_email = $user2->e_mail;
                $token->created_at = new Datetime();
                $token->save();
                return response()->json(["token"=>$key, "user"=>"employee"],200);

            }else{
                return response()->json(["msg"=>"Invalid username password!"]);
            }
        }else if($user3){
            if(md5($req->pass) == $user3->b_pass){
                 
                $token->token_key = $key;
                $token->user_email = $user3->b_mail;
                $token->created_at = new Datetime();
                $token->save();
                return response()->json(["token"=>$key, "user"=>"buyer"],200);

            }else{
                return response()->json(["msg"=>"Invalid username password!"]);
            }
        }else if($user4){
            if(md5($req->pass) == $user4->s_pass){

                
                $token->token_key = $key;
                $token->user_email = $user4->s_mail;
                $token->created_at = new Datetime();
                $token->save();
                return response()->json(["token"=>$key, "user"=>"seller"],200);


            }else{
                return response()->json(["msg"=>"Invalid username password!"]);
            }
        }else{
            return response()->json(["msg"=>"This email is not registered!"]);
        }

    }
    function loginUserInfo(Request $req, $token){
        $userData = Token::where('token_key', '=', $req->token)->whereNULL('expired_at')->first();
        if($userData){
            return response()->json([$userData]);
        }
        return response()->json([$userData]);
    }



    function logout(Request $req)
    {
        $key = $req->token;
        if($key){
            $tk = Token::where("token_key", "=", $key)->first();
            $tk->expired_at = new Datetime();
            $tk->save();
        }
    }
}
