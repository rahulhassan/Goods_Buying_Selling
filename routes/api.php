<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\seller\postController;
use App\Http\Controllers\seller\sDashboardController;
use App\Http\Controllers\seller\sProfileController;
use App\Http\Controllers\seller\sStatementController;
use App\Http\Controllers\seller\sOrderController;
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

Route::post('/login',[apiLoginController::class,'login']);
Route::any('/logout',[apiLoginController::class,'logout']);

Route::post('/registration',[userController::class, 'validateRegistration']);

// _________________Seller__________________________

Route::get('/seller/products',[sDashboardController::class,'showProduct']);
Route::delete('/seller/delete/{id}',[sDashboardController::class,'sellerProductDelete']);
Route::get('/seller/profile',[sProfileController::class,'sellerDetails']);

Route::put('/seller/post',[postController::class,'validateSellerPost']);
Route::get('/seller/edit/{id}',[sDashboardController::class,'sellerUpdateShow']);
Route::put('/seller/update/{id}',[postController::class,'sellerPostUpdate']);