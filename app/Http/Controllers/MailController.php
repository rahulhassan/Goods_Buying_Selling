<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SignUpMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    // public static function sendSignUpMail($name,$email,$verification_code)
    // {
    //     $data=[
    //         'name'=>$name,
    //         'verification_code'=>$verification_code
    //     ];
    //     Mail::to($email)->send(new SignUpMail($data));
    // }
}
