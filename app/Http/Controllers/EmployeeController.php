<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\employee\employeeUser;
use App\Models\buyer\buyerUser;
use App\Models\seller\sellerUser;
use DB;
use Illuminate\Support\Str;




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

    function edit(Request $req){
       
       $data= employeeUser::find($req->e_id);
       
       return view('employee.edit',compact('data')); 
    } 

    function update(Request $req){
        
        
       $data= employeeUser::find($req->e_id);
       $data-> e_name = $req-> name;
       $data-> e_phn= $req-> phone;
       $data-> e_mail= $req->Email;
       $data-> e_add= $req-> address;
       $data->save(); 

      
        return redirect()->route('employee.empprofile');
    }

    function destroy($id){
     //$data = employeeUser::find($id);
     //$data->delete();
     employeeUser::destroy($id);
     return redirect()->route('employee.empprofile');
    }

    function create(){

        return view('employee.insert');
    }
    

    function insert(Request $req){
        $validated = $request->validate([
            'e_name' => 'required|unique:categories|max:255',
            'e_phn' => 'required',
            'e_mail' => 'required',
            'e_add' => 'required',
        ]);

        $data = new employeUser;
        $data -> e_name = $req->Name  ;
        $data -> e_phn = $req->Phone;
        $data -> e_mail = $req->Email ;
        $data -> e_add = $req->Address ;
        $data ->save();

     return redirect()->back();
    }


}
