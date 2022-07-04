<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\employeeUser;
use App\Models\buyer\buyerUser;
use App\Models\seller\sellerUser;
use DB;




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
       //$data=DB::table('employee')->where('e_id',$id)->first();
       return view('employee.edit',compact('data')); 
    } 

    function update(Request $req){
        
       $data= employeeUser::find($req->e_id);
       $data-> e_name = $req-> name;
       $data-> e_phn= $req-> phone;
       $data-> e_mail= $req->Email;
       $data-> e_add= $req-> address;
       $data->save(); 
        return redirect()->route('/layout/navbar1');
    }


}
