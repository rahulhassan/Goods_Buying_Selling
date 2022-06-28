<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\seller\postController;
use App\Http\Controllers\seller\sDashboardController;
use App\Http\Controllers\seller\sProfileController;
use App\Http\Controllers\seller\sStatementController;
use App\Http\Controllers\buyer\ProductController;
use App\Http\Controllers\buyer\BuyerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|sStatementController
*/

Route::get('/', function () { return view('welcome'); });

Route::get('/seller/post', function(){ return view('seller/sellerPost'); })->name('seller.post');

Route::post('/seller/post',[postController::class,'validateSellerPost'])->name('submit.sellerPost');

Route::get('/seller/dashboard',[sDashboardController::class,'showProduct'])->name('seller.dashboard');

Route::get('/seller/delete/{id}',[sDashboardController::class,'sellerDelete']);


Route::get('/seller/profile',[sProfileController::class,'sellerDetails'])->name('seller.profile');

Route::get('/seller/statement',[sStatementController::class,'monthlyStatement'])->name('seller.statement');


//___________________________Buyer_________________________________


Route::get('dashboard',[ProductController::class,'dashboard'])->name('buyer.other.dashboard');
Route::get('productDetails/{title}',[ProductController::class,'productDetails'])->name('buyer.other.productDetails');
Route::get('logout',[ProductController::class,'logout'])->name('buyer.other.logout');
Route::get('profile',[BuyerController::class,'profile'])->name('buyer.other.profile');
Route::get('account',[BuyerController::class,'account'])->name('buyer.other.account');
Route::get('orders',[BuyerController::class,'orders'])->name('buyer.other.orders');

Route::get('/login',[BuyerController::class,'login'])->name('buyer.other.login');
Route::post('/login',[BuyerController::class,'loginSubmit'])->name('buyer.other.loginSubmit');
