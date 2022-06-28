<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\seller\postController;
use App\Http\Controllers\seller\sDashboardController;
use App\Http\Controllers\seller\sProfileController;
use App\Http\Controllers\seller\sStatementController;
use App\Http\Controllers\userController;
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


Route::get('/', function () { return view('home'); })->name('home');

Route::get('/registration',[function(){return view('registration');}])->name('user.registration')->middleware('loginExist');

Route::post('/registration',[userController::class, 'validateRegistration'])->name('submit.registration');

Route::get('/login',[function () {return view('login');}])->name('user.login')->middleware('loginExist');

Route::post('/login',[userController::class, 'checkLogin'])->name('submit.login');

Route::get('/logout',[userController::class, 'userLogout'])->name('user.logout');

//___________________________Seller_________________________________


Route::get('/seller/post', function(){ return view('seller/sellerPost'); })->name('seller.post')->middleware('isLoggedIn');

Route::post('/seller/post',[postController::class,'validateSellerPost'])->name('submit.sellerPost');

Route::get('/seller/dashboard',[sDashboardController::class,'showProduct'])->name('seller.dashboard')->middleware('isLoggedIn');

Route::get('/seller/delete/{id}',[sDashboardController::class,'sellerDelete']);
Route::get('/seller/edit/{id}',[sDashboardController::class,'sellerUpdateShow']);
Route::post('/seller/edit',[postController::class,'sellerUpdate'])->name('seller.postUpdate');

Route::get('/seller/profile',[sProfileController::class,'sellerDetails'])->name('seller.profile')->middleware('isLoggedIn');

Route::get('/seller/statement',[sStatementController::class,'monthlyStatement'])->name('seller.statement')->middleware('isLoggedIn');


//___________________________Buyer_________________________________


Route::get('dashboard',[ProductController::class,'dashboard'])->name('buyer.other.dashboard');
Route::get('productDetails/{title}',[ProductController::class,'productDetails'])->name('buyer.other.productDetails');
//Route::get('logout',[ProductController::class,'logout'])->name('buyer.other.logout');
Route::get('profile',[BuyerController::class,'profile'])->name('buyer.other.profile');
Route::get('account',[BuyerController::class,'account'])->name('buyer.other.account');
Route::get('orders',[BuyerController::class,'orders'])->name('buyer.other.orders');

//Route::get('/login',[BuyerController::class,'login'])->name('buyer.other.login');
//Route::post('/login',[BuyerController::class,'loginSubmit'])->name('buyer.other.loginSubmit');
