<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\seller\postController;
use App\Http\Controllers\seller\sDashboardController;
use App\Http\Controllers\seller\sProfileController;
use App\Http\Controllers\seller\sStatementController;
use App\Http\Controllers\seller\sOrderController;
use App\Http\Controllers\userController;
use App\Http\Controllers\buyer\ProductController;
use App\Http\Controllers\buyer\BuyerController;
use App\Http\Controllers\adminDashboardC;
use App\Http\Controllers\buyer\OrderController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes

|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|sStatementController
*/


Route::get('/', function () { return view('home'); })->name('home')->middleware('loginExist');

Route::get('/registration',[function(){return view('registration');}])->name('user.registration')->middleware('loginExist');

Route::post('/registration',[userController::class, 'validateRegistration'])->name('submit.registration');

Route::get('/login',[function () {return view('login');}])->name('user.login')->middleware('loginExist');

Route::post('/login',[userController::class, 'checkLogin'])->name('submit.login');

Route::get('/logout',[userController::class, 'userLogout'])->name('user.logout');

//___________________________Seller_________________________________


Route::get('/seller/post', function(){ return view('seller/sellerPost'); })->name('seller.post')->middleware('isLoggedIn');

Route::post('/seller/post',[postController::class,'validateSellerPost'])->name('submit.sellerPost');

Route::get('/seller/dashboard',[sDashboardController::class,'showProduct'])->name('seller.dashboard')->middleware('isLoggedIn');

Route::get('/seller/delete/{id}',[sDashboardController::class,'sellerProductDelete']);
Route::get('/seller/edit/{id}',[sDashboardController::class,'sellerUpdateShow']);
Route::post('/seller/edit',[postController::class,'sellerPostUpdate'])->name('seller.postUpdate');

Route::get('/seller/profile',[sProfileController::class,'sellerDetails'])->name('seller.profile')->middleware('isLoggedIn');

Route::get('/seller/update/profile',[sProfileController::class,'sellerEditInfo'])->name('seller.update')->middleware('isLoggedIn');


Route::post('/seller/update/profile',[sProfileController::class,'sellerInfoUpdate'])->name('submit.sellerInfo');

Route::get('/seller/orders',[sOrderController::class,'orderInfo'])->name('seller.orders')->middleware('isLoggedIn');

Route::get('/seller/statement',[sStatementController::class,'monthlyStatement'])->name('seller.statement')->middleware('isLoggedIn');

Route::get('seller/shipping/{id}',[sOrderController::class,'productShip']);

//___________________________Buyer_________________________________



Route::get('/dashboard',[ProductController::class,'dashboard'])->name('buyer.other.dashboard')->middleware('isLoggedIn');

Route::get('productDetails/{title}',[ProductController::class,'productDetails'])->name('buyer.other.productDetails');
//Route::get('logout',[ProductController::class,'logout'])->name('buyer.other.logout');
Route::get('profile',[BuyerController::class,'profile'])->name('buyer.other.profile');
Route::get('account',[BuyerController::class,'account'])->name('buyer.other.account');
Route::get('orders',[BuyerController::class,'orders'])->name('buyer.other.orders');

//Route::get('/login',[BuyerController::class,'login'])->name('buyer.other.login');
//Route::post('/login',[BuyerController::class,'loginSubmit'])->name('buyer.other.loginSubmit');

Route::get('/productDetails/{title}',[ProductController::class,'productDetails'])->name('buyer.other.productDetails');
Route::get('/orderDetails/{title}',[ProductController::class,'orderDetails'])->name('buyer.other.orderDetails');
//Route::get('/logout',[ProductController::class,'logout'])->name('buyer.other.logout');
Route::post('/search',[ProductController::class,'search'])->name('buyer.other.search');


Route::get('/profile',[BuyerController::class,'profile'])->name('buyer.other.profile');
Route::get('/updateProfile',[BuyerController::class,'updateProfile'])->name('buyer.other.updateProfile');
Route::post('/updateProfile',[BuyerController::class,'updateProfileSubmit'])->name('buyer.other.updateProfileSubmit');
Route::get('/account',[BuyerController::class,'account'])->name('buyer.other.account');
Route::get('/orders',[BuyerController::class,'orders'])->name('buyer.other.orders');
Route::get('/buyerlogin',[BuyerController::class,'login'])->name('buyer.other.login');
Route::post('/buyerlogin',[BuyerController::class,'loginSubmit'])->name('buyer.other.loginSubmit');

Route::get('/cart',[OrderController::class,'addToCart'])->name('buyer.other.cart');
Route::post('/cart',[OrderController::class,'addToCartSubmit'])->name('buyer.other.cartSubmit');
Route::post('/placeOrder/{title}',[OrderController::class,'placeOrderSubmit'])->name('buyer.other.placeOrderSubmit');
Route::get('/my_orders',[OrderController::class,'orders'])->name('buyer.other.orders');
Route::get('/cart/destroy/{c_id}',[OrderController::class,'destroy']);
Route::post('/cart/quantity/update/{c_id}',[OrderController::class,'cartQuantityUpdate']);
Route::post('/coupon/apply',[OrderController::class,'couponApply']);
Route::get('/coupon/destroy',[OrderController::class,'couponDestroy']);
Route::get('/productDetails/cart/checkout/orderDetails',[OrderController::class,'checkout'])->name('buyer.other.checkout');

Route::post('/placeOrder',[OrderController::class,'placeOrder'])->name('buyer.other.placeOrder');
Route::get('/orderCompleted',[OrderController::class,'orderCompleted'])->name('buyer.other.orderCompleted');




//___________________________ADMIN_________________________________
Route::get('/admin/adminDashboard',[adminDashboardC::class,'Dashboard'])->name('admin.adminDashboard');

Route::get('/admin/files/statement',[adminDashboardC::class,'Statement'])->name('admin.files.statement');

Route::get('/admin/files/buyer',[adminDashboardC::class,'Buyer'])->name('admin.files.buyer');

Route::get('/admin/files/employee',[adminDashboardC::class,'Employee'])->name('admin.files.employee');

Route::get('/admin/files/seller',[adminDashboardC::class,'Seller'])->name('admin.files.seller');

Route::get('/admin/files/coupon',[adminDashboardC::class,'coupon'])->name('admin.files.coupon');

Route::get('/admin/files/order',[adminDashboardC::class,'OrderO'])->name('admin.files.order');

Route::get('/admin/files/profile',[adminDashboardC::class,'Profile'])->name('admin.files.profile');
Route::post('/admin/files/profile',[adminDashboardC::class,'updatePass'])->name('admin.files.updatePass');
Route::post('/admin/files/upload',[adminDashboardC::class,'upload'])->name('admin.files.upload');


//-----------------------------CRUD EMPLOYEE

Route::get('/admin/files/createEmp',[adminDashboardC::class,'CreateEmp'])->name('admin.files.createEmp');

Route::post('/admin/files/createEmp',[adminDashboardC::class,'storeEmp'])->name('submit.storeEmp');

Route::get('/admin/files/delete/{id}',[adminDashboardC::class,'DeleteEmp']);

Route::get('/admin/files/show/{e_id}',[adminDashboardC::class,'showEmp']);
Route::post('/admin/files/show',[adminDashboardC::class,'UpdateEmp'])->name('submit.updateEmp');

//-----------------------------CRUD SELLER

Route::get('/admin/files/createSeller',[adminDashboardC::class,'createSeller'])->name('admin.files.createSeller');

Route::post('/admin/files/createSeller',[adminDashboardC::class,'storeSeller'])->name('submit.storeSeller');

Route::get('/admin/files/deleteSeller/{id}',[adminDashboardC::class,'DeleteSeller']);

Route::get('/admin/files/showSeller/{s_id}',[adminDashboardC::class,'showSeller']);
Route::post('/admin/files/showSeller',[adminDashboardC::class,'UpdateSeller'])->name('submit.updateSeller');

//-----------------------------CRUD BUYER

Route::get('/admin/files/createBuyer',[adminDashboardC::class,'createBuyer'])->name('admin.files.createBuyer');

Route::post('/admin/files/createBuyer',[adminDashboardC::class,'storeBuyer'])->name('submit.storeBuyer');

Route::get('/admin/files/deleteBuyer/{id}',[adminDashboardC::class,'DeleteBuyer']);

Route::get('/admin/files/showBuyer/{b_id}',[adminDashboardC::class,'showBuyer']);
Route::post('/admin/files/showBuyer',[adminDashboardC::class,'UpdateBuyer'])->name('submit.updateBuyer');

//-----------------------------COUPON


Route::get('/admin/files/addCoupon',[adminDashboardC::class,'addCoupon'])->name('admin.files.addCoupon');
Route::post('/admin/files/addCoupon',[adminDashboardC::class,'storeCoupon'])->name('submit.storeCoupon');
Route::get('/admin/files/deleteCoupon/{id}',[adminDashboardC::class,'DeleteCoupon']);

// Route::get('/admin/files/otp',[adminDashboardC::class, 'mailer']);//MAIL SENDING

//=====================Employeee

Route::get('/layout/navbar1' , [EmployeeController::class, 'navbar',]);
Route::get('employee/empprofile' , [EmployeeController::class, 'EmpProfile',]);
Route::get('employee/buyerlist', [EmployeeController::class, 'BuyerList']);
Route::get('employee/sellerlist', [EmployeeController::class, 'SellerList']);
Route::get('employee/edit/{id}', [EmployeeController::class, 'edit']);
Route::post('employee/update/{id}', [EmployeeController::class, 'update']);
Route::get('employee/delete/{id}', [EmployeeController::class, 'destroy']);
Route::get('employee/create}', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('employee/insert}', [EmployeeController::class, 'insert'])->name('employee.insert');

