<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datetime;
use Illuminate\Support\Str;
use App\Models\Token;

class apiLoginController extends Controller
{
    function login(Request $req){
        if($req->uname=="tanvir" && $req->pass=="1234"){
            $key = Str::random(67);
            $token = new Token();
            $token->token_key = $key;
            $token->user_id = 1;
            $token->created_at = new Datetime();
            $token->save();
            return response()->json(["token"=>$key],200);
        }
        return response()->json(["msg"=>"Invalid Username password"]);
    }
    function logout(Request $req)
    {
        $key = $req->token;
        if($key){
            $tk = Token::where("token_key",$key)->first();
            $tk->expired_at = new Datetime();
            $tk->save();
        }
    }
}
