<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\seller\postController;
use App\Http\Controllers\seller\sDashboardController;
use App\Http\Controllers\seller\sProfileController;
use App\Http\Controllers\seller\sStatementController;

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