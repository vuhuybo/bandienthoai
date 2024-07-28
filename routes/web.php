<?php

use App\Http\Controllers\Admin1Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariantController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ShopproductController;
use App\Http\Controllers\CouponController;
use App\Models\Coupon;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/loginad', [Admin1Controller::class,'loginad'])->name('loginad');
// Route::post('/loginad', [Admin1Controller::class,'postLoginad'])->name('admin.loginad');
// Route::get('/logout', [Admin1Controller::class,'logout'])->name('admin.logout'); ->middleware('admin')

//route nhóm prefix('tên chug')
Route::prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index']);
    Route::resource('category',CategoryController::class);
    Route::resource('product',ProductController::class);
    Route::resource('variant',VariantController::class);
    Route::resource('banner',BannerController::class);
    Route::resource('coupon',CouponController::class);
});




Route::get('/', [UserController::class,'index']);
Route::get('detail/{name_product}', [UserController::class,'detail'])->name('detail');
Route::get('add-cart', [CartController::class,'addCart'])->name('addCart');
Route::get('check-cart', [CartController::class,'CheckCard'])->name('checkcard');
Route::get('update-cart', [CartController::class,'UpdateCard'])->name('updatecard');

Route::get('viewcart', [UserController::class,'viewcart'])->name('viewcart');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('destroy');
Route::get('/checkCart', [CartController::class, 'checkCart'])->name('checkCart');
Route::get('/update-quantity-cart', [CartController::class,'quantityCart'])->name('quantityCart');

Route::get('/checkout/{id}', [CheckoutController::class,'checkout'])->name('checkout');
Route::post('checkoutproduct',[CheckoutController::class,'checkoutproduct'])->name('checkoutproduct');

Route::post('add-customer',[CustomerController::class,'addcustomer'])->name('customer');
Route::post('get-customer',[CustomerController::class,'getcustomer'])->name('getcustomer');


Route::post('addInvoice',[InvoiceController::class,'addInvoice'])->name('addInvoice');

//Sản phẩm
Route::get('shopproduct',[UserController::class,'shopproduct'])->name('shopproduct');
Route::get('/category/{name}', [UserController::class, 'showByCategory'])->name('showByCategory');
//Sản phẩm


//khuyến mãi
Route::get('applypromotion',[CouponController::class,'applypromotion'])->name('applypromotion');


//Đăng nhập Đăng ký


Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

Route::get('email/verify', [App\Http\Controllers\Auth\VerificationController::class, 'show'])->name('verification.notice');
Route::get('email/verify/{id}/{hash}', [App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');



//Tìm kiếm sản phẩm
Route::get('/search', [ProductController::class, 'search'])->name('search');


