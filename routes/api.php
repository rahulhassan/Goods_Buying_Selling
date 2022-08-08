<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminAPI;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//___________________________ADMIN_________________________________
Route::get('/admin/adminDashboard',[adminAPI::class,'Dashboard'])->name('admin.adminDashboard');

Route::get('/admin/files/statement',[adminAPI::class,'Statement'])->name('admin.files.statement');

Route::get('/admin/files/buyer',[adminAPI::class,'Buyer'])->name('admin.files.buyer');

Route::get('/admin/files/employee',[adminAPI::class,'Employee'])->name('admin.files.employee');

Route::get('/admin/files/seller',[adminAPI::class,'Seller'])->name('admin.files.seller');

Route::get('/admin/files/coupon',[adminAPI::class,'coupon'])->name('admin.files.coupon');

Route::get('/admin/files/order',[adminAPI::class,'OrderO'])->name('admin.files.order');

Route::get('/admin/files/profile',[adminAPI::class,'Profile'])->name('admin.files.profile');
Route::post('/admin/files/profile',[adminAPI::class,'updatePass'])->name('admin.files.updatePass');
Route::post('/admin/files/upload',[adminAPI::class,'upload'])->name('admin.files.upload');


//-----------------------------CRUD EMPLOYEE

Route::get('/admin/files/createEmp',[adminAPI::class,'CreateEmp'])->name('admin.files.createEmp');

Route::post('/admin/files/createEmp',[adminAPI::class,'storeEmp'])->name('submit.storeEmp');

Route::get('/admin/files/delete/{id}',[adminAPI::class,'DeleteEmp']);

Route::get('/admin/files/show/{e_id}',[adminAPI::class,'showEmp']);
Route::post('/admin/files/show',[adminAPI::class,'UpdateEmp'])->name('submit.updateEmp');

//-----------------------------CRUD SELLER

Route::get('/admin/files/createSeller',[adminAPI::class,'createSeller'])->name('admin.files.createSeller');

Route::post('/admin/files/createSeller',[adminAPI::class,'storeSeller'])->name('submit.storeSeller');

Route::get('/admin/files/deleteSeller/{id}',[adminAPI::class,'DeleteSeller']);

Route::get('/admin/files/showSeller/{s_id}',[adminAPI::class,'showSeller']);
Route::post('/admin/files/showSeller',[adminAPI::class,'UpdateSeller'])->name('submit.updateSeller');

//-----------------------------CRUD BUYER

Route::get('/admin/files/createBuyer',[adminAPI::class,'createBuyer'])->name('admin.files.createBuyer');

Route::post('/admin/files/createBuyer',[adminAPI::class,'storeBuyer'])->name('submit.storeBuyer');

Route::get('/admin/files/deleteBuyer/{id}',[adminAPI::class,'DeleteBuyer']);

Route::get('/admin/files/showBuyer/{b_id}',[adminAPI::class,'showBuyer']);
Route::post('/admin/files/showBuyer',[adminAPI::class,'UpdateBuyer'])->name('submit.updateBuyer');

//-----------------------------COUPON


Route::get('/admin/files/addCoupon',[adminAPI::class,'addCoupon'])->name('admin.files.addCoupon');
Route::post('/admin/files/addCoupon',[adminAPI::class,'storeCoupon'])->name('submit.storeCoupon');
Route::get('/admin/files/deleteCoupon/{id}',[adminAPI::class,'DeleteCoupon']);