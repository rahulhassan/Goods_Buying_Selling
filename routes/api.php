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
Route::get('/admin/adminDashboard',[adminAPI::class,'Dashboard']);

Route::get('/admin/files/statement',[adminAPI::class,'Statement']);

Route::get('/admin/files/buyer',[adminAPI::class,'Buyer']);

Route::get('/admin/files/employee',[adminAPI::class,'Employee']);

Route::get('/admin/files/seller',[adminAPI::class,'Seller']);

Route::get('/admin/files/coupon',[adminAPI::class,'coupon']);

Route::get('/admin/files/order',[adminAPI::class,'OrderO']);

Route::get('/admin/files/profile',[adminAPI::class,'Profile']);
Route::post('/admin/files/profile',[adminAPI::class,'updatePass']);
Route::post('/admin/files/upload',[adminAPI::class,'upload']);


//-----------------------------CRUD EMPLOYEE

Route::get('/admin/files/createEmp',[adminAPI::class,'CreateEmp']);

Route::post('/admin/files/createEmp',[adminAPI::class,'storeEmp']);

Route::get('/admin/files/delete/{id}',[adminAPI::class,'DeleteEmp']);

Route::get('/admin/files/show/{e_id}',[adminAPI::class,'showEmp']);
Route::post('/admin/files/show',[adminAPI::class,'UpdateEmp']);

//-----------------------------CRUD SELLER

Route::get('/admin/files/createSeller',[adminAPI::class,'createSeller']);

Route::post('/admin/files/createSeller',[adminAPI::class,'storeSeller']);

Route::get('/admin/files/deleteSeller/{id}',[adminAPI::class,'DeleteSeller']);

Route::get('/admin/files/showSeller/{s_id}',[adminAPI::class,'showSeller']);
Route::post('/admin/files/showSeller',[adminAPI::class,'UpdateSeller']);

//-----------------------------CRUD BUYER

Route::get('/admin/files/createBuyer',[adminAPI::class,'createBuyer']);

Route::post('/admin/files/createBuyer',[adminAPI::class,'storeBuyer']);

Route::get('/admin/files/deleteBuyer/{id}',[adminAPI::class,'DeleteBuyer']);

Route::get('/admin/files/showBuyer/{b_id}',[adminAPI::class,'showBuyer']);
Route::post('/admin/files/showBuyer',[adminAPI::class,'UpdateBuyer']);

//-----------------------------COUPON


Route::get('/admin/files/addCoupon',[adminAPI::class,'addCoupon']);
Route::post('/admin/files/addCoupon',[adminAPI::class,'storeCoupon']);
Route::get('/admin/files/deleteCoupon/{id}',[adminAPI::class,'DeleteCoupon']);


Route::post('/login',[apiLoginController::class,'login']);
Route::post('/logout',[apiLoginController::class,'logout']);
Route::post('/registration',[userController::class, 'validateRegistration']);




//_________________________________Buyer___________________________________________


Route::get('/dashboard',[ApiProductController::class,'dashboard']);
Route::get('/productDetails/{id}/{title}',[ApiProductController::class,'productDetails']);
Route::get('/orderDetails/{title}',[ApiProductController::class,'orderDetails']);
//Route::get('/logout',[ApiProductController::class,'logout'])->name('buyer.other.logout');
Route::post('/search',[ApiProductController::class,'search']);




//Route::get('logout',[ApiProductController::class,'logout'])->name('buyer.other.logout');
Route::get('/profile/{id}',[ApiBuyerController::class,'profile']);
Route::get('/updateProfile/{id}',[ApiBuyerController::class,'updateProfile']);
Route::post('/updateProfile/{id}',[ApiBuyerController::class,'updateProfileSubmit']);
Route::get('/account',[ApiBuyerController::class,'account']);
Route::get('/orders',[ApiBuyerController::class,'orders']);
Route::get('/showCoupon/{id}',[ApiBuyerController::class,'showCoupon']);

//_________________

//Route::get('/buyerlogin',[BuyerController::class,'login'])->name('buyer.other.login');
//Route::post('/buyerlogin',[BuyerController::class,'loginSubmit'])->name('buyer.other.loginSubmit');

Route::get('/cart/{id}',[ApiOrderController::class,'addToCart']);
Route::post('/cart/{id}',[ApiOrderController::class,'addToCartSubmit']);
Route::post('/placeOrder/{id}/{title}',[ApiOrderController::class,'placeOrderSubmit']);
Route::get('/my_orders/{id}',[ApiOrderController::class,'orders']);
Route::delete('/my_orders/delete/{b_id}/{o_id}',[ApiOrderController::class,'ordersDelete']);

Route::delete('/cart/destroy/{b_id}/{c_id}',[ApiOrderController::class,'destroy']);
// Route::post('/cart/quantity/update/{c_id}',[ApiOrderController::class,'cartQuantityUpdate']);

Route::put('/updateCartQuantity/{b_id}/{cart_id}/{scope}',[ApiOrderController::class,'updateCartQuantity']);// problem

//________wishlist__________

Route::get('/wishlist/{b_id}',[ApiOrderController::class,'showWishList']);
Route::post('/addToWishList/{b_id}',[ApiOrderController::class,'addToWishList']);
Route::delete('/deleteProductFromWishList/delete/{b_id}/{w_id}',[ApiOrderController::class,'deleteProductFromWishList']);

//______coupon_____________

Route::post('/coupon/apply/{id}',[ApiOrderController::class,'couponApply']);
Route::get('/coupon/destroy',[ApiOrderController::class,'couponDestroy']);

//________place order_________

Route::get('/productDetails/cart/checkout/orderDetails/{id}',[ApiOrderController::class,'checkout']);
Route::post('/placeOrder/{id}',[ApiOrderController::class,'placeOrder']);
Route::get('/orderCompleted',[ApiOrderController::class,'orderCompleted']);


//_________________________________Seller___________________________________________


Route::get('/seller/products/{id}',[sDashboardController::class,'showProduct'])->middleware('APIAuth');

Route::delete('/seller/delete/{id}',[sDashboardController::class,'sellerProductDelete']);

Route::get('/seller/profile',[sProfileController::class,'sellerDetails'])->middleware('APIAuth');

Route::post('/seller/post',[postController::class,'validateSellerPost'])->middleware('APIAuth');

Route::get('/seller/edit/{id}',[sDashboardController::class,'sellerUpdateShow'])->middleware('APIAuth');

Route::post('/seller/update/{id}',[postController::class,'sellerPostUpdate']);

Route::get('/seller/profile/{id}',[sProfileController::class,'sellerDetails'])->middleware('APIAuth');

Route::post('/seller/profile/update',[sProfileController::class,'sellerInfoUpdate'])->middleware('APIAuth');

Route::get('/seller/info/{token}',[apiLoginController::class, 'loginUserInfo'])->middleware('APIAuth');

Route::get('/seller/orders/{id}',[sOrderController::class,'orderInfo'])->middleware('APIAuth');

Route::get('/seller/shipping/{id}',[sOrderController::class,'productShip']);

Route::get('/seller/statement',[sStatementController::class,'monthlyStatement'])->middleware('APIAuth');