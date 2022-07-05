<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee\employeeUser;
use App\Models\admin\adminUser;
use App\Models\buyer\buyerUser;
use App\Models\buyer\productModel;
use App\Models\seller\sellerUser;
use App\Models\buyer\CouponModel;
use App\Models\buyer\Order;
use App\Models\buyer\OrderItem;
use DB;

use Illuminate\Support\Facades\mailer;


class adminDashboardC extends Controller
{
    //--------------------------DASHBOARD-----------------------------------
    
    function Dashboard(){
        $emp = DB::table('employee')->count();
        $buy = DB::table('buyer')->count();
        $sell = DB::table('seller')->count();
        $ord = DB::table('orders')->count();
        $emp = DB::table('employee')->count();
        $empl=employeeUser::all();
        $data = adminUser::where('a_id','=',1)->first();
        $orderall=Order::paginate(10);
        $x=0;
        foreach ($orderall as $o)
        {
            $x+=$o->total;
        }
        return view('admin/adminDashboard', compact('emp', 'buy', 'sell', 'ord', 'x'), ['emplall' => $empl])->with('data', $data)->with('orderall', $orderall);
    }
    //--------------------------STATEMENTS-----------------------------------

    function Statement(){
        $data = adminUser::where('a_id','=',1)->first();
        return view('admin/files/statement')->with('data', $data);
    }
    //--------------------------BUYER-----------------------------------

    function Buyer(){
        $buyall=buyerUser::paginate(5);
        $buy = DB::table('buyer')->count();
        $data = adminUser::where('a_id','=',1)->first();

        
        return view('admin/files/buyer', ['buyall' => $buyall], compact('buy'))->with('data', $data);
    }
    function CreateBuyer(){
        $data = adminUser::where('a_id','=',1)->first();
        
        return view('admin/files/createBuyer')->with('data', $data);
    }
    function storeBuyer(Request $request){
        $this->validate($request,
             [
                "b_name"=>"required|regex:^[a-zA-Z\s\.\-]+$^",//SMALL AND CAPITAL & . & - ACCEPTED
                "b_mail"=>"required|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}+$/i",//like: abc@gmail.com
                "b_phn"=>"required|regex:/^\+[8]{2}[0-9]{11}+$/i",//11 Digits And Need +880
                "b_add"=>"required",
                "b_pass"=>"required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",//MUST 8 CHARECTER, Symbol, Capital & Small
             ],
             [
                "b_name.required"=> "Please provide your name!!!",
                "b_name.regex"=> "Please provide your name properly (. & - is accepted)!!!",
                "b_mail.required"=> "Please provide your email!!!",
                "b_mail.regex"=> "Please provide correct email like abc@gmail.com!!!",
                "b_phn.required"=> "Please provide your phone number!!!",
                "b_phn.regex"=> "Please provide correct phone number like +880---------!!!",
                "b_add.required"=> "Please provide your address!!!",
                "b_pass.required"=> "Please provide your password!!!",
                "b_pass.regex"=> "Please provide password which have 8 charecter, capital and small letter & symbol like @ABcd12#!!!"

             ]
        );
        $a = new buyerUser();
        $a->b_name= $request->b_name;
        $a->b_phn= $request->b_phn;
        $a->b_mail= $request->b_mail;
        $a->b_pass= $request->b_pass;
        $a->b_add= $request->b_add;
        $a->save();
        
        return redirect()->route('admin.files.buyer');
    
    }
    function DeleteBuyer(Request $request){
        $b_id=$request->id;
        $data = buyerUser::where('b_id',$b_id)->first();
        $data->delete();
        return redirect()->route('admin.files.buyer');
    }
    function showBuyer($b_id){
        
        $data = buyerUser::find($b_id);
        return view('admin.files.updateBuyer',['data'=>$data]);
    }
    function UpdateBuyer(Request $req){
        $this->validate($req,
             [
                "b_name"=>"required|regex:^[a-zA-Z\s\.\-]+$^",//SMALL AND CAPITAL & . & - ACCEPTED
                "b_mail"=>"required|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}+$/i",//like: abc@gmail.com
                "b_phn"=>"required|regex:/^\+[8]{2}[0-9]{11}+$/i",//11 Digits And Need +880
                "b_add"=>"required",
                "b_pass"=>"required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",//MUST 8 CHARECTER, Symbol, Capital & Small
             ],
             [
                "b_name.required"=> "Please provide your name!!!",
                "b_name.regex"=> "Please provide your name properly (. & - is accepted)!!!",
                "b_mail.required"=> "Please provide your email!!!",
                "b_mail.regex"=> "Please provide correct email like abc@gmail.com!!!",
                "b_phn.required"=> "Please provide your phone number!!!",
                "b_phn.regex"=> "Please provide correct phone number like +880---------!!!",
                "b_add.required"=> "Please provide your address!!!",
                "b_pass.required"=> "Please provide your password!!!",
                "b_pass.regex"=> "Please provide password which have 8 charecter, capital and small letter & symbol like @ABcd12#!!!"

             ]
        );
        $buyData = buyerUser::find($req->b_id);
        $buyData->b_name = $req->b_name;
        $buyData->b_phn = $req->b_phn;
        $buyData->b_mail = $req->b_mail;
        $buyData->b_pass = $req->b_pass;
        $buyData->b_add = $req->b_add;
        $buyData->save();
        $data = adminUser::where('a_id','=',1)->first();

        
        return redirect()->route('admin.files.buyer')->with('data', $data);
    }
    //--------------------------SELLER-----------------------------------

    function Seller(){
        $sellall=sellerUser::paginate(5);
        $sel = DB::table('seller')->count();
        $data = adminUser::where('a_id','=',1)->first();


        
        return view('admin/files/seller', ['sellall' => $sellall], compact('sel'))->with('data', $data);
    }
    function CreateSeller(){
        $data = adminUser::where('a_id','=',1)->first();

        
        return view('admin/files/createSeller')->with('data', $data);
    }
    function storeSeller(Request $request){
        $this->validate($request,
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
        $a = new sellerUser();
        $a->s_name= $request->s_name;
        $a->s_phn= $request->s_phn;
        $a->s_mail= $request->s_mail;
        $a->s_pass= $request->s_pass;
        $a->s_add= $request->s_add;
        $a->save();
        
        return redirect()->route('admin.files.seller');
    
    }
    function DeleteSeller(Request $request){
        $s_id=$request->id;
        $data = sellerUser::where('s_id',$s_id)->first();
        $data->delete();
        return redirect()->route('admin.files.seller');
    }
    function showSeller($s_id){
        
        $data = sellerUser::find($s_id);
        return view('admin.files.updateSeller',['data'=>$data]);
    }
    function UpdateSeller(Request $req){
        $this->validate($req,
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
        $selData = sellerUser::find($req->s_id);
        $selData->s_name = $req->s_name;
        $selData->s_phn = $req->s_phn;
        $selData->s_mail = $req->s_mail;
        $selData->s_pass = $req->s_pass;
        $selData->s_add = $req->s_add;
        $selData->save();
        $data = adminUser::where('a_id','=',1)->first();

        
        return redirect()->route('admin.files.seller')->with('data', $data);
    }
    //--------------------------EMPLOYEE-----------------------------------

    function Employee(){
        $empall=employeeUser::paginate(5);
        $emp = DB::table('employee')->count();
        $data = adminUser::where('a_id','=',1)->first();


        
        return view('admin/files/employee', ['empall' => $empall], compact('emp'))->with('data', $data);
    }
    function CreateEmp(){
        $data = adminUser::where('a_id','=',1)->first();

        
        return view('admin/files/createEmp')->with('data', $data);
    }
    function storeEmp(Request $request){
        $this->validate($request,
             [
                "e_name"=>"required|regex:^[a-zA-Z\s\.\-]+$^",//SMALL AND CAPITAL & . & - ACCEPTED
                "e_mail"=>"required|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}+$/i",//like: abc@gmail.com
                "e_phn"=>"required|regex:/^\+[8]{2}[0-9]{11}+$/i",//11 Digits And Need +880
                "e_add"=>"required",
                "e_pass"=>"required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",//MUST 8 CHARECTER, Symbol, Capital & Small
             ],
             [
                "e_name.required"=> "Please provide your name!!!",
                "e_name.regex"=> "Please provide your name properly (. & - is accepted)!!!",
                "e_mail.required"=> "Please provide your email!!!",
                "e_mail.regex"=> "Please provide correct email like abc@gmail.com!!!",
                "e_phn.required"=> "Please provide your phone number!!!",
                "e_phn.regex"=> "Please provide correct phone number like +880---------!!!",
                "e_add.required"=> "Please provide your address!!!",
                "e_pass.required"=> "Please provide your password!!!",
                "e_pass.regex"=> "Please provide password which have 8 charecter, capital and small letter & symbol like @ABcd12#!!!"

             ]
        );
        $a = new employeeUser();
        $a->e_name= $request->e_name;
        $a->e_phn= $request->e_phn;
        $a->e_mail= $request->e_mail;
        $a->e_pass= $request->e_pass;
        $a->e_add= $request->e_add;
        $a->save();
        
        return redirect()->route('admin.files.employee');
    
    }
    function DeleteEmp(Request $request){
        $e_id=$request->id;
        $data = employeeUser::where('e_id',$e_id)->first();
        $data->delete();
        return redirect()->route('admin.files.employee');
    }
    function showEmp($e_id){
        
        $data = employeeUser::find($e_id);
        return view('admin.files.updateEmp',['data'=>$data]);
    }
    function UpdateEmp(Request $req){
        $this->validate($req,
             [
                "e_name"=>"required|regex:^[a-zA-Z\s\.\-]+$^",//SMALL AND CAPITAL & . & - ACCEPTED
                "e_mail"=>"required|regex:/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}+$/i",//like: abc@gmail.com
                "e_phn"=>"required|regex:/^\+[8]{2}[0-9]{11}+$/i",//11 Digits And Need +880
                "e_add"=>"required",
                "e_pass"=>"required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/",//MUST 8 CHARECTER, Symbol, Capital & Small
             ],
             [
                "e_name.required"=> "Please provide your name!!!",
                "e_name.regex"=> "Please provide your name properly (. & - is accepted)!!!",
                "e_mail.required"=> "Please provide your email!!!",
                "e_mail.regex"=> "Please provide correct email like abc@gmail.com!!!",
                "e_phn.required"=> "Please provide your phone number!!!",
                "e_phn.regex"=> "Please provide correct phone number like +880---------!!!",
                "e_add.required"=> "Please provide your address!!!",
                "e_pass.required"=> "Please provide your password!!!",
                "e_pass.regex"=> "Please provide password which have 8 charecter, capital and small letter & symbol like @ABcd12#!!!"

             ]
        );
        $empData = employeeUser::find($req->e_id);
        $empData->e_name = $req->e_name;
        $empData->e_phn = $req->e_phn;
        $empData->e_mail = $req->e_mail;
        $empData->e_pass = $req->e_pass;
        $empData->e_add = $req->e_add;
        $empData->save();
        $data = adminUser::where('a_id','=',1)->first();

        
        return redirect()->route('admin.files.employee')->with('data', $data);
    }

    //--------------------------SELL INFORMATION-----------------------------------
    function OrderO(){
        $orderall = Order::paginate(10);
        $ord = DB::table('orders')->count();
        $data = adminUser::where('a_id','=',1)->first();

        return view('admin/files/order', ['orderall' => $orderall], compact('ord'))->with('data', $data);
    }
    //--------------------------COUPON-----------------------------------
    function coupon(){
        $cupall=CouponModel::paginate(5);
        $cup = DB::table('coupon')->count();
        $data = adminUser::where('a_id','=',1)->first();


        return view('admin/files/coupon', ['cupall' => $cupall], compact('cup'))->with('data', $data);
    }
    function addCoupon(){
        $data = adminUser::where('a_id','=',1)->first();

        return view('admin/files/addCoupon')->with('data', $data);
    }
    function storeCoupon(Request $request){
        $c = new CouponModel();
        $c->cpn_name = $request->cpn_name;
        $c->discount = $request->discount;
        $c->save();
        
        return redirect()->route('admin.files.coupon');
    }
    function DeleteCoupon(Request $request){
        $cpn_id=$request->id;
        $data = CouponModel::where('cpn_id',$cpn_id)->first();
        $data->delete();
        return redirect()->route('admin.files.coupon');
    }
    //--------------------------PROFILE-----------------------------------
    function Profile(){
        $data = adminUser::where('a_id','=',1)->first();
        return view('admin/files/profile')->with('data', $data)->with('data', $data);
    }
    function upload(Request $request){
        $img = $request->pf;
        $name = $img->getClientOriginalName();
        $img->storeAs('public/images',$name);

        $image = adminUser::find(1);
        $image->a_image = $name;
        $image -> save();
        return redirect()->route('admin.files.profile')->with('image', $image);
    }
    function updatePass(Request $req){
        $this->validate($req,
        [
           "o_pass"=>"required",
           "a_pass"=>"required",
           "r_pass"=>"required",
        ],
        [
           "o_pass.required"=> "Please provide right password!!!",
           "a_pass.required"=> "Please provide a password!!!",
           "r_pass.required"=> "Please provide your password again!!!",

        ]);
        $PASS=$req->o_pass;
        $data =adminUser::where('a_PASS',$PASS)->first();
        $data->a_PASS=$req->a_pass;
        $data->save();
        return redirect()->back()->with('success', 'OLD PASSWORD CHANGE SUCCESSFULLY'); 
        
    }
    // function mialer(){
    //     Mail::to(["a_mail"])->send(new mailer('Subject','Body'));
    // }
   
}
