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
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/dashboard',[ProductController::class,'dashboard'])->name('buyer.other.dashboard');


//_________________________________Buyer___________________________________________


Route::get('/dashboard',[ProductController::class,'dashboard']);
Route::get('/productDetails/{title}',[ProductController::class,'productDetails']);
Route::get('/orderDetails/{title}',[ProductController::class,'orderDetails']);
//Route::get('/logout',[ProductController::class,'logout'])->name('buyer.other.logout');
Route::post('/search',[ProductController::class,'search']);


//Route::get('logout',[ProductController::class,'logout'])->name('buyer.other.logout');
Route::get('/profile',[BuyerController::class,'profile']);
Route::get('/updateProfile',[BuyerController::class,'updateProfile']);
Route::post('/updateProfile',[BuyerController::class,'updateProfileSubmit']);
Route::get('/account',[BuyerController::class,'account']);
Route::get('/orders',[BuyerController::class,'orders']);


//Route::get('/buyerlogin',[BuyerController::class,'login'])->name('buyer.other.login');
//Route::post('/buyerlogin',[BuyerController::class,'loginSubmit'])->name('buyer.other.loginSubmit');

Route::get('/cart',[OrderController::class,'addToCart']);
Route::post('/cart',[OrderController::class,'addToCartSubmit']);
Route::post('/placeOrder/{title}',[OrderController::class,'placeOrderSubmit']);
Route::get('/my_orders',[OrderController::class,'orders']);
Route::get('/cart/destroy/{c_id}',[OrderController::class,'destroy']);
Route::post('/cart/quantity/update/{c_id}',[OrderController::class,'cartQuantityUpdate']);
Route::post('/coupon/apply',[OrderController::class,'couponApply']);
Route::get('/coupon/destroy',[OrderController::class,'couponDestroy']);
Route::get('/productDetails/cart/checkout/orderDetails',[OrderController::class,'checkout']);

Route::post('/placeOrder',[OrderController::class,'placeOrder']);
Route::get('/orderCompleted',[OrderController::class,'orderCompleted']);

