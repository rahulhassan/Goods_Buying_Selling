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
use App\Http\Controllers\buyer\OrderController;


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


Route::get('/dashboard',[ProductController::class,'dashboard'])->name('buyer.other.dashboard');
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