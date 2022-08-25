<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\employeeUser;
use App\Models\buyer\buyerUser;
use App\Models\seller\sellerUser;
use Illuminate\Support\Facades\Validator;


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
    
    function AddEmp(){

        return response()->json();
    }
    function AddSeller(){

        return response()->json();
    }

    function storeEmployee(Request $request){
        $validator = Validator::make($request->all(),

             [
                "e_name"=>"required|regex:^[a-zA-Z\s\.\-]+$^",//SMALL AND CAPITAL & . & - ACCEPTED
                "e_mail"=>"required|unique:seller,s_mail|unique:buyer,b_mail|unique:employee,e_mail|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}+$/i",//like: abc@gmail.com
                "e_phn"=>"required|unique:seller,s_phn|unique:buyer,b_phn|unique:employee,e_phn|regex:/^[0-9]{11}+$/i",//11 Digits
                "e_add"=>"required",
                "e_pass"=>"required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",//MUST 8 CHARECTER, Symbol, Capital & Small
             ],
             [
                "e_name.required"=> "Please provide your name!!!",
                "e_name.regex"=> "Please provide your name properly (. & - is accepted)!!!",
                "e_mail.required"=> "Please provide your email!!!",
                "e_mail.regex"=> "Please provide correct email like abc@gmail.com!!!",
                "e_phn.required"=> "Please provide your phone number!!!",
                "e_phn.regex"=> "Please provide correct phone number",
                "e_add.required"=> "Please provide your address!!!",
                "e_pass.required"=> "Please provide your password!!!",
                "e_pass.regex"=> "Please provide password which have 8 charecter, capital and small letter & symbol like @ABcd12#!!!"

             ]
        );
        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=> $validator->errors(),
            ]);
        }
        $a = new employeeUser();
        $a->e_name= $request->e_name;
        $a->e_phn= $request->e_phn;
        $a->e_mail= $request->e_mail;
        $a->e_pass= $request->e_pass;
        $a->e_add= $request->e_add;
        $a->save();
        return response()->json(["msg"=>"Success","status"=>200]);
    
    }

    function AddBuyer(){

        return response()->json();
    }

    function storeSeller(Request $request){
        $validator = Validator::make($request->all(),

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
        $a = new sellerUser();
        $a->s_name= $request->name;
        $a->s_phn= $request->phone;
        $a->s_mail= $request->email;
        $a->s_pass= $request->password;
        $a->s_add= $request->address;
        $a->save();
        return response()->json(["msg"=>"Success","data"=>$a]);
    
    }

    function storeBuyer(Request $request){
        $validator = Validator::make($request->all(),

             [
                "b_name"=>"required|regex:^[a-zA-Z\s\.\-]+$^",//SMALL AND CAPITAL & . & - ACCEPTED
                "b_mail"=>"required|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}+$/i",//like: abc@gmail.com
                "b_phn"=>"required|regex:/^[0-9]{11}+$/i",//11 Digits 
                "b_add"=>"required",
                "b_pass"=>"required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",//MUST 8 CHARECTER, Symbol, Capital & Small
             ],
             [
                "b_name.required"=> "Please provide your name!!!",
                "b_name.regex"=> "Please provide your name properly (. & - is accepted)!!!",
                "b_mail.required"=> "Please provide your email!!!",
                "b_mail.regex"=> "Please provide correct email like abc@gmail.com!!!",
                "b_phn.required"=> "Please provide your phone number!!!",
                "b_phn.regex"=> "Please provide correct phone number",
                "b_add.required"=> "Please provide your address!!!",
                "b_pass.required"=> "Please provide your password!!!",
                "b_pass.regex"=> "Please provide password which have 8 charecter, capital and small letter & symbol like @ABcd12#!!!"

             ]
        );
        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }
        $a = new buyerUser();
        $a->b_name= $request->b_name;
        $a->b_phn= $request->b_phn;
        $a->b_mail= $request->b_mail;
        $a->b_pass= $request->b_pass;
        $a->b_add= $request->b_add;
        $a->save();
        return response()->json(["msg"=>"Success","data"=>$a]);
    
    }

    function deleteEmp($id){
        $data = employeeUser::where('e_id',$id)->first();
        $data->delete();
        return response()->json($data);

    }

    function deleteSeller(Request $request){
        $e_id=$request->id;
        $data = sellerUser::where('s_id',$s_id)->first();
        $data->delete();
        return response()->json($data);

    }


    function deleteBuyer(Request $request){
        $b_id=$request->id;
        $data = buyerUser::where('b_id',$b_id)->first();
        $data->delete();
        return response()->json($data);
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
            
    
        $data = employeeUser::find( $req->id);
        $data->e_name = $req->name;
        $data->e_mail = $req->email;
        $data->e_phn = $req->phone;
        $data->e_add = $req->address;
        $rsp = $data->save();

        if($rsp){
            return response()->json(["status"=> 200, "msg"=>"Profile info is updated!"]);
        }

        return response()->json("something wrong");

    }
        
    

    

   function buyeredit($id){
      $data= buyerUser::find($id);
       
         return response()->json($data);
      }

  

      function selleredit($id){
         $data= sellerUser::find($id);
       
         return response()->json($data);
      }

      function sellerupdate(Request $req) {
        

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
            
    
        $data = sellerUser::find( $req->id);
        $data->s_name = $req->name;
        $data->s_mail = $req->email;
        $data->s_phn = $req->phone;
        $data->s_add = $req->address;
        $rsp = $data->save();

        if($rsp){
            return response()->json(["status"=> 200, "msg"=>"Profile info is updated!"]);
        }

        return response()->json("something wrong");

    }

    function buyerupdate(Request $req) {
        

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
            
    
        $data = buyerUser::find( $req->id);
        $data->b_name = $req->name;
        $data->b_mail = $req->email;
        $data->b_phn = $req->phone;
        $data->b_add = $req->address;
        $rsp = $data->save();

        if($rsp){
            return response()->json(["status"=> 200, "msg"=>"Profile info is updated!"]);
        }

        return response()->json("something wrong");

    }
   

}
