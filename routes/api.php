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

Route::get('/admin/files/statement',[adminAPI::class,'Statement'])->name('admin.files.statement');

Route::get('/admin/files/buyer',[adminAPI::class,'Buyer']);

Route::get('/admin/files/employee',[adminAPI::class,'Employee'])->name('admin.files.employee');

Route::get('/admin/files/seller',[adminAPI::class,'Seller'])->name('admin.files.seller');

Route::get('/admin/files/coupon',[adminAPI::class,'coupon']);

Route::get('/admin/files/order',[adminAPI::class,'OrderO'])->name('admin.files.order');

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
Route::get('/productDetails/{title}',[ApiProductController::class,'productDetails']);
Route::get('/orderDetails/{title}',[ApiProductController::class,'orderDetails']);
//Route::get('/logout',[ApiProductController::class,'logout'])->name('buyer.other.logout');
Route::post('/search',[ApiProductController::class,'search']);

Route::post('/wishlist',[ApiProductController::class,'addToWishList']);


//Route::get('logout',[ApiProductController::class,'logout'])->name('buyer.other.logout');
Route::get('/profile',[ApiBuyerController::class,'profile']);
Route::get('/updateProfile',[ApiBuyerController::class,'updateProfile']);
Route::post('/updateProfile',[ApiBuyerController::class,'updateProfileSubmit']);
Route::get('/account',[ApiBuyerController::class,'account']);
Route::get('/orders',[ApiBuyerController::class,'orders']);
Route::get('/showCoupon',[ApiBuyerController::class,'showCoupon']);



//Route::get('/buyerlogin',[BuyerController::class,'login'])->name('buyer.other.login');
//Route::post('/buyerlogin',[BuyerController::class,'loginSubmit'])->name('buyer.other.loginSubmit');

Route::get('/cart',[ApiOrderController::class,'addToCart']);
Route::post('/cart',[ApiOrderController::class,'addToCartSubmit']);
Route::post('/placeOrder/{title}',[ApiOrderController::class,'placeOrderSubmit']);
Route::get('/my_orders',[ApiOrderController::class,'orders']);
Route::delete('/my_orders/delete/{id}',[ApiOrderController::class,'ordersDelete']);

Route::delete('/cart/destroy/{c_id}',[ApiOrderController::class,'destroy']);
Route::post('/cart/quantity/update/{c_id}',[ApiOrderController::class,'cartQuantityUpdate']);

Route::put('/updateCartQuantity/{cart_id}/{scope}',[ApiOrderController::class,'updateCartQuantity']);

Route::post('/coupon/apply',[ApiOrderController::class,'couponApply']);
Route::get('/coupon/destroy',[ApiOrderController::class,'couponDestroy']);
Route::get('/productDetails/cart/checkout/orderDetails',[ApiOrderController::class,'checkout']);

Route::post('/placeOrder',[ApiOrderController::class,'placeOrder']);
Route::get('/orderCompleted',[ApiOrderController::class,'orderCompleted']);


//_________________________________Seller___________________________________________


Route::get('/seller/products/{id}',[sDashboardController::class,'showProduct']);
Route::delete('/seller/delete/{id}',[sDashboardController::class,'sellerProductDelete']);
Route::get('/seller/profile',[sProfileController::class,'sellerDetails']);
Route::post('/seller/post',[postController::class,'validateSellerPost']);
Route::get('/seller/edit/{id}',[sDashboardController::class,'sellerUpdateShow']);
Route::post('/seller/update/{id}',[postController::class,'sellerPostUpdate']);
Route::get('/seller/profile/{id}',[sProfileController::class,'sellerDetails']);
Route::post('/seller/profile/update',[sProfileController::class,'sellerInfoUpdate']);

Route::get('/seller/info/{token}',[apiLoginController::class, 'loginUserInfo']);



//_________________________________Employee___________________________________________
Route::get('/employee/empprofile' , [EmployeeController::class, 'EmpProfile']);
Route::get('/employee/edit/{id}', [EmployeeController::class, 'edit']);
Route::post('/employee/edit', [EmployeeController::class, 'update']);
Route::get('/employee/buyerlist', [EmployeeController::class, 'BuyerList']);
Route::get('/employee/editbuyer/{id}', [EmployeeController::class, 'buyeredit']);
Route::post('/employee/editbuyer', [EmployeeController::class, 'buyerupdate']);
Route::get('/employee/sellerlist', [EmployeeController::class, 'SellerList']);
Route::get('/employee/editseller/{id}', [EmployeeController::class, 'selleredit']);
Route::post('/employee/editseller', [EmployeeController::class, 'sellerupdate']);



