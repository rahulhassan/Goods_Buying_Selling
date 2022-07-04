<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    function EmpHome(){
        return view('employee.emphome');
    }
    function EmpProfile(){
        return view('employee.empprofile');
    }

    function BuyerList(){
        return view('employee.buyerlist');
    }

    function SellerList(){
        return view('employee.sellerlist');
    }
}
