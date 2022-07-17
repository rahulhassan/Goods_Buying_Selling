<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\employeeUser;
use App\Models\buyer\buyerUser;
use App\Models\seller\sellerUser;







class EmployeeController extends Controller
{
    function navbar(){
        return view('employee.layout.navbar1');
    }
    //function EmpHome(){
      //  return view('employee.emphome');
    //}
    function EmpProfile(){
       
       // $emp=DB::table('employee')->get();
       // return view('employee.empprofile',compact('emp'));

       $emp=employeeUser::all();
       return view('employee.empprofile',compact('emp'));
    }

    function BuyerList(){
        $buyer=buyerUser::all();
       return view('employee.buyerlist',compact('buyer'));
    }

    function SellerList(){
        $seller=sellerUser::all();
       return view('employee.sellerlist',compact('seller'));
       
    }

    function edit($id){
       
       $data= employeeUser::find($id);
       
       return view('employee/edit',compact('data')); 
    } 

   function update(Request $req) {
        
      $this->validate($req,
         [
            "e_name"=>"required|regex:^[a-zA-Z\s\.\-]+$^",//SMALL AND CAPITAL & . & - ACCEPTED
            "e_mail"=>"required|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}+$/i",//like: abc@gmail.com
            "e_phn"=>"required|regex:/^[0-9]{11}+$/i",//11 Digits And Need +880
            "e_add"=>"required"
            
         ],
         [
            "e_name.required"=> "Please provide your name!!!",
            "e_name.regex"=> "Please provide your name properly (. & - is accepted)!!!",
            "e_mail.required"=> "Please provide your email",
            "e_mail.regex"=> "Please provide correct email like abc@gmail.com!!!",
            "e_phn.required"=> "Please provide your phone number",
            "e_phn.regex"=> "Please provide correct phone number",
            "e_add.required"=> "Please provide your address!!!"
         ]
      );
      
      $data = employeeUser::find($req->e_id);
      $data->e_name = $req->e_name;
      $data->e_phn = $req->e_phn;
      $data->e_mail = $req->e_mail;
      $data->e_add = $req->e_add;
      $data->save();
      return redirect()->route('profile.employee');

   } 
}
