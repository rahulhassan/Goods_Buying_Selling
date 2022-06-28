<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\seller\postController;
use App\Http\Controllers\seller\sDashboardController;
use App\Http\Controllers\seller\sProfileController;
use App\Http\Controllers\seller\sStatementController;
use App\Http\Controllers\userController;
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


Route::get('/registration',[function(){return view('registration');}])->name('user.registration');

Route::post('/registration',[userController::class, 'validateRegistration'])->name('submit.registration');

Route::get('/login',[function () {return view('login');}])->name('user.login');

Route::post('/login',[userController::class, 'checkLogin'])->name('submit.login');


Route::get('/seller/post', function(){ return view('seller/sellerPost'); })->name('seller.post');

Route::post('/seller/post',[postController::class,'validateSellerPost'])->name('submit.sellerPost');

Route::get('/seller/dashboard',[sDashboardController::class,'showProduct'])->name('seller.dashboard');

Route::get('/seller/delete/{id}',[sDashboardController::class,'sellerDelete']);
Route::get('/seller/edit/{id}',[sDashboardController::class,'sellerUpdateShow']);
Route::post('/seller/edit',[postController::class,'sellerUpdate'])->name('seller.postUpdate');

Route::get('/seller/profile',[sProfileController::class,'sellerDetails'])->name('seller.profile');

Route::get('/seller/statement',[sStatementController::class,'monthlyStatement'])->name('seller.statement');