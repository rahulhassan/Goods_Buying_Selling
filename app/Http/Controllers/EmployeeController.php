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
   
    function EmpProfile(){
       
      $data=employeeUser::all();

      return response()->json($data); 

     
    }

    function BuyerList(){
        $buyer=buyerUser::all();
        return response()->json($buyer);
    }

    function SellerList(){
        $seller=sellerUser::all();
        return response()->json($seller);
       
    }

    function edit($id){
       
          $data= employeeUser::find($id);
         
         return response()->json($data);

      
    } 

function update(Request $req) {
        

      $validator = Validator::make($req->all(),[
         
         'name'=>"required|regex:/^[a-zA-Z\s\.\-]+$/",
         'email'=>"required|email|unique:users|regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,3}$/",
         'phone'=>"required|regex:/^[0-9]{11}+$/i",
         'address'=>"required"
     ],
     [
         'name.required'=>'Provide a valid name',
         'email.required'=>'Provide a valid email'
     ]);
      if($validator->fails()){
         return response()->json([
             "status"=> 422,
             "errors"=> $validator->errors(),
         ]);
     }
         
 
     $data = employeeUser::find( $req->e_id);
     $data->e_name = $req->name;
     $data->e_mail = $req->email;
     $data->e_phn = $req->phone;
     $data->e_add = $req->address;
     $rsp = $data->save();

     if($rsp){
      return response()->json([
         "status"=> 200,
          "msg"=>"Profile info is updated!",
          
      ]);
  }

  return response()->json("something wrong");

 
    }

   function buyeredit($id){
      $data= employeeUser::find($id);
       
         return response()->json($data);
      }

   function buyerupdate(Request $req){
     
 
      $validator = Validator::make($req->all(),[
         
         'name'=>"required|regex:/^[a-zA-Z\s\.\-]+$/",
         'email'=>"required|email|unique:users|regex:/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,3}$/",
         'phone'=>"required|regex:/^[0-9]{11}+$/i",
         'address'=>"required"
     ],
     [
         'name.required'=>'Provide a valid name',
         'email.required'=>'Provide a valid email'
     ]);
     if($validator->fails()){
         return response()->json([
             'status'=>422,
             'errors'=> $validator->errors(),
         ]);
     }
         
 
     $data = employeeUser::find( $req->e_id);
     $data->e_name = $req->name;
     $data->e_mail = $req->email;
     $data->e_phn = $req->phone;
     $data->e_add = $req->address;

     $res = $data->save();
     if($res){
         return response()->json([
             'msg'=>'Profile info is updated!',
             'status'=>200,
         ]);
     }

     return response()->json('something wrong');
      
  }

      function selleredit($id){
         $data= employeeUser::find($id);
       
         return response()->json($data);
      }

      function sellerupdate(Request $req){
         $validator = Validator::make($req->all(),

         [
            "s_name"=>"required|regex:^[a-zA-Z\s\.\-]+$^",//SMALL AND CAPITAL & . & - ACCEPTED
            "s_mail"=>"required|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}+$/i",//like: abc@gmail.com
            "s_phn"=>"required|regex:/^\+[8]{2}[0-9]{11}+$/i",//11 Digits And Need +880
            "s_add"=>"required",
            "s_pass"=>"required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",//MUST 8 CHARECTER, Symbol, Capital & Small
         ],
         [
            "s_name.required"=> "Please provide your name!!!",
            "s_name.regex"=> "Please provide your name properly (. & - is accepted)!!!",
            "s_mail.required"=> "Please provide your email!!!",
            "s_mail.regex"=> "Please provide correct email like abc@gmail.com!!!",
            "s_phn.required"=> "Please provide your phone number!!!",
            "s_phn.regex"=> "Please provide correct phone number like +880---------!!!",
            "s_add.required"=> "Please provide your address!!!",
            "s_pass.required"=> "Please provide your password!!!",
            "s_pass.regex"=> "Please provide password which have 8 charecter, capital and small letter & symbol like @ABcd12#!!!"
   
         ]
    );
    if($validator->fails()){
        return response()->json($validator->errors(),422);
    }
    $emp = employeeUser::find($req->s_id);
    $emp->s_name = $req->s_name;
    $emp->s_phn = $req->s_phn;
    $emp->s_mail = $req->s_mail;
    $emp->s_pass = $req->s_pass;
    $emp->s_add = $req->s_add;
    $emp->save();
    $emp = EmployeeUser::where('s_id','=',1)->first();
   
    return response()->json(["msg"=>"Success","data"=>$emp]);
      
      

   }
   

}
