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

   function buyeredit($id){
      $data= buyerUser::find($id);
       
      return view('employee/editbuyer',compact('data')); 
      }

   function buyerupdate(Request $req){
      $this->validate($req,
         [
            "b_name"=>"required|regex:^[a-zA-Z\s\.\-]+$^",//SMALL AND CAPITAL & . & - ACCEPTED
            "b_mail"=>"required|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}+$/i",//like: abc@gmail.com
            "b_phn"=>"required|regex:/^[0-9]{11}+$/i",//11 Digits And Need +880
            "b_add"=>"required"
            
         ],
         [
            "b_name.required"=> "Please provide your name!!!",
            "b_name.regex"=> "Please provide your name properly (. & - is accepted)!!!",
            "b_mail.required"=> "Please provide your email",
            "b_mail.regex"=> "Please provide correct email like abc@gmail.com!!!",
            "b_phn.required"=> "Please provide your phone number",
            "b_phn.regex"=> "Please provide correct phone number",
            "b_add.required"=> "Please provide your address!!!"
         ]
      );
      
      $data = buyerUser::find($req->b_id);
      $data->b_name = $req->b_name;
      $data->b_phn = $req->b_phn;
      $data->b_mail = $req->b_mail;
      $data->b_add = $req->b_add;
      $data->save();
      return redirect()->route('profile.buyer');

   }

      function selleredit($id){
      $data= sellerUser::find($id);
       
      return view('employee/editseller',compact('data')); 
      }

      function sellerupdate(Request $req){
      $this->validate($req,
         [
            "s_name"=>"required|regex:^[a-zA-Z\s\.\-]+$^",//SMALL AND CAPITAL & . & - ACCEPTED
            "s_mail"=>"required|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}+$/i",//like: abc@gmail.com
            "s_phn"=>"required|regex:/^[0-9]{11}+$/i",//11 Digits And Need +880
            "s_add"=>"required"
            
         ],
         [
            "s_name.required"=> "Please provide your name!!!",
            "s_name.regex"=> "Please provide your name properly (. & - is accepted)!!!",
            "s_mail.required"=> "Please provide your email",
            "s_mail.regex"=> "Please provide correct email like abc@gmail.com!!!",
            "s_phn.required"=> "Please provide your phone number",
            "s_phn.regex"=> "Please provide correct phone number",
            "s_add.required"=> "Please provide your address!!!"
         ]
      );
      
      $data = sellerUser::find($req->s_id);
      $data->s_name = $req->s_name;
      $data->s_phn = $req->s_phn;
      $data->s_mail = $req->s_mail;
      $data->s_add = $req->s_add;
      $data->save();
      return redirect()->route('profile.seller');

   }
   

}
