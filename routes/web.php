<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\seller\postController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { return view('welcome'); });

Route::get('/seller/post', function(){ return view('seller/sellerPost'); });

Route::post('/seller/post',[postController::class,'validateSellerPost'])->name('seller.post');