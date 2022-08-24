<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class alreadyLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Session()->has('loginId') && (url('login') == $request->url() || url('registration') == $request->url() || url('/') == $request->url())){
            return back();
        }
        return $next($request);
        // $token = $request->header("Authorization");
        // if($token){
        //     $key = Token::where('token_key',$token)
        //                 ->whereNull('expired_at')->first();

        //     if($key) return response()->json(["msg"=>"You already logged in!"],401); 
        //     return $next($request);
        // }
        // return $next($request);
    }
}
