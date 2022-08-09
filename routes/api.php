<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\adminAPI;



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

//___________________________ADMIN_________________________________
Route::get('/admin/adminDashboard',[adminAPI::class,'Dashboard'])->name('admin.adminDashboard');

Route::get('/admin/files/statement',[adminAPI::class,'Statement'])->name('admin.files.statement');

Route::get('/admin/files/buyer',[adminAPI::class,'Buyer'])->name('admin.files.buyer');

Route::get('/admin/files/employee',[adminAPI::class,'Employee'])->name('admin.files.employee');

Route::get('/admin/files/seller',[adminAPI::class,'Seller'])->name('admin.files.seller');

Route::get('/admin/files/coupon',[adminAPI::class,'coupon'])->name('admin.files.coupon');

Route::get('/admin/files/order',[adminAPI::class,'OrderO'])->name('admin.files.order');

Route::get('/admin/files/profile',[adminAPI::class,'Profile'])->name('admin.files.profile');
Route::post('/admin/files/profile',[adminAPI::class,'updatePass'])->name('admin.files.updatePass');
Route::post('/admin/files/upload',[adminAPI::class,'upload'])->name('admin.files.upload');


//-----------------------------CRUD EMPLOYEE

Route::get('/admin/files/createEmp',[adminAPI::class,'CreateEmp'])->name('admin.files.createEmp');

Route::post('/admin/files/createEmp',[adminAPI::class,'storeEmp'])->name('submit.storeEmp');

Route::get('/admin/files/delete/{id}',[adminAPI::class,'DeleteEmp']);

Route::get('/admin/files/show/{e_id}',[adminAPI::class,'showEmp']);
Route::post('/admin/files/show',[adminAPI::class,'UpdateEmp'])->name('submit.updateEmp');

//-----------------------------CRUD SELLER

Route::get('/admin/files/createSeller',[adminAPI::class,'createSeller'])->name('admin.files.createSeller');

Route::post('/admin/files/createSeller',[adminAPI::class,'storeSeller'])->name('submit.storeSeller');

Route::get('/admin/files/deleteSeller/{id}',[adminAPI::class,'DeleteSeller']);

Route::get('/admin/files/showSeller/{s_id}',[adminAPI::class,'showSeller']);
Route::post('/admin/files/showSeller',[adminAPI::class,'UpdateSeller'])->name('submit.updateSeller');

//-----------------------------CRUD BUYER

Route::get('/admin/files/createBuyer',[adminAPI::class,'createBuyer'])->name('admin.files.createBuyer');

Route::post('/admin/files/createBuyer',[adminAPI::class,'storeBuyer'])->name('submit.storeBuyer');

Route::get('/admin/files/deleteBuyer/{id}',[adminAPI::class,'DeleteBuyer']);

Route::get('/admin/files/showBuyer/{b_id}',[adminAPI::class,'showBuyer']);
Route::post('/admin/files/showBuyer',[adminAPI::class,'UpdateBuyer'])->name('submit.updateBuyer');

//-----------------------------COUPON


Route::get('/admin/files/addCoupon',[adminAPI::class,'addCoupon'])->name('admin.files.addCoupon');
Route::post('/admin/files/addCoupon',[adminAPI::class,'storeCoupon'])->name('submit.storeCoupon');
Route::get('/admin/files/deleteCoupon/{id}',[adminAPI::class,'DeleteCoupon']);


Route::post('/login',[apiLoginController::class,'login']);
Route::any('/logout',[apiLoginController::class,'logout']);

Route::post('/registration',[userController::class, 'validateRegistration']);



//_________________________________Buyer___________________________________________


Route::get('/dashboard',[ApiProductController::class,'dashboard']);
Route::get('/productDetails/{title}',[ApiProductController::class,'productDetails']);
Route::get('/orderDetails/{title}',[ApiProductController::class,'orderDetails']);
//Route::get('/logout',[ApiProductController::class,'logout'])->name('buyer.other.logout');
Route::post('/search',[ApiProductController::class,'search']);


//Route::get('logout',[ApiProductController::class,'logout'])->name('buyer.other.logout');
Route::get('/profile',[ApiBuyerController::class,'profile']);
Route::get('/updateProfile',[ApiBuyerController::class,'updateProfile']);
Route::put('/updateProfile',[ApiBuyerController::class,'updateProfileSubmit']);
Route::get('/account',[ApiBuyerController::class,'account']);
Route::get('/orders',[ApiBuyerController::class,'orders']);



//Route::get('/buyerlogin',[BuyerController::class,'login'])->name('buyer.other.login');
//Route::post('/buyerlogin',[BuyerController::class,'loginSubmit'])->name('buyer.other.loginSubmit');

Route::get('/cart',[ApiOrderController::class,'addToCart']);
Route::post('/cart',[ApiOrderController::class,'addToCartSubmit']);
Route::post('/placeOrder/{title}',[ApiOrderController::class,'placeOrderSubmit']);
Route::get('/my_orders',[ApiOrderController::class,'orders']);
Route::delete('/my_orders/delete/{id}',[ApiOrderController::class,'ordersDelete']);

Route::get('/cart/destroy/{c_id}',[ApiOrderController::class,'destroy']);
Route::post('/cart/quantity/update/{c_id}',[ApiOrderController::class,'cartQuantityUpdate']);
Route::post('/coupon/apply',[ApiOrderController::class,'couponApply']);
Route::get('/coupon/destroy',[ApiOrderController::class,'couponDestroy']);
Route::get('/productDetails/cart/checkout/orderDetails',[ApiOrderController::class,'checkout']);

Route::post('/placeOrder',[ApiOrderController::class,'placeOrder']);
Route::get('/orderCompleted',[ApiOrderController::class,'orderCompleted']);


//_________________________________Seller___________________________________________


Route::get('/seller/products',[sDashboardController::class,'showProduct']);
Route::delete('/seller/delete/{id}',[sDashboardController::class,'sellerProductDelete']);
Route::get('/seller/profile',[sProfileController::class,'sellerDetails']);
Route::post('/seller/post',[postController::class,'validateSellerPost']);
Route::get('/seller/edit/{id}',[sDashboardController::class,'sellerUpdateShow']);
Route::put('/seller/update/{id}',[postController::class,'sellerPostUpdate']);

Route::get('/seller/profile/{id}',[sProfileController::class,'sellerDetails']);

