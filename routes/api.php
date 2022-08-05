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
use App\Http\Controllers\buyer\ApiProductController;
use App\Http\Controllers\buyer\ApiBuyerController;
use App\Http\Controllers\buyer\ApiOrderController;


use App\Http\Controllers\adminDashboardC;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


use App\Http\Controllers\apiLoginController;

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




//_________________________________Buyer___________________________________________


Route::get('/dashboard',[ApiProductController::class,'dashboard']);
Route::get('/productDetails/{title}',[ApiProductController::class,'productDetails']);
Route::get('/orderDetails/{title}',[ApiProductController::class,'orderDetails']);
//Route::get('/logout',[ApiProductController::class,'logout'])->name('buyer.other.logout');
Route::post('/search',[ApiProductController::class,'search']);


//Route::get('logout',[ApiProductController::class,'logout'])->name('buyer.other.logout');
Route::get('/profile',[ApiBuyerController::class,'profile']);
Route::get('/updateProfile',[ApiBuyerController::class,'updateProfile']);
Route::post('/updateProfile',[ApiBuyerController::class,'updateProfileSubmit']);
Route::get('/account',[ApiBuyerController::class,'account']);
Route::get('/orders',[ApiBuyerController::class,'orders']);


//Route::get('/buyerlogin',[BuyerController::class,'login'])->name('buyer.other.login');
//Route::post('/buyerlogin',[BuyerController::class,'loginSubmit'])->name('buyer.other.loginSubmit');

Route::get('/cart',[ApiOrderController::class,'addToCart']);
Route::post('/cart',[ApiOrderController::class,'addToCartSubmit']);
Route::post('/placeOrder/{title}',[ApiOrderController::class,'placeOrderSubmit']);
Route::get('/my_orders',[ApiOrderController::class,'orders']);
Route::get('/cart/destroy/{c_id}',[ApiOrderController::class,'destroy']);
Route::post('/cart/quantity/update/{c_id}',[ApiOrderController::class,'cartQuantityUpdate']);
Route::post('/coupon/apply',[ApiOrderController::class,'couponApply']);
Route::get('/coupon/destroy',[ApiOrderController::class,'couponDestroy']);
Route::get('/productDetails/cart/checkout/orderDetails',[ApiOrderController::class,'checkout']);

Route::post('/placeOrder',[ApiOrderController::class,'placeOrder']);
Route::get('/orderCompleted',[ApiOrderController::class,'orderCompleted']);

//_______________________________________________________________

Route::post('/login',[apiLoginController::class,'login']);
Route::any('/logout',[apiLoginController::class,'logout']);

// _________________Seller__________________________

Route::get('/seller/products',[sDashboardController::class,'showProduct']);
Route::get('/seller/profile',[sProfileController::class,'sellerDetails']);

