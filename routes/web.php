<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShipController;
use App\Models\Branch;
use Illuminate\Support\Facades\Route;

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
// Frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('trang-chu', [HomeController::class, 'index'])->name('trang-chu');
Route::get('danh-muc/{id}', [HomeController::class, 'getCate'])->name('danh-muc');
Route::get('thuong-hieu/{id}', [HomeController::class, 'getBranch'])->name('thuong-hieu');
Route::get('chi-tiet/{id}', [HomeController::class, 'getDetail'])->name('chi-tiet');
Route::get('tim-kiem', [HomeController::class, 'search'])->name('tim-kiem');
Route::get('san-pham', [HomeController::class, 'getAllProduct'])->name('san-pham');
 //@cart
    Route::get('show-cart', [CartController::class, 'showCart'])->name('show-cart');
    Route::post('add-cart', [CartController::class, 'addCart'])->name('add-cart');
    Route::get('delete-cart/{id}', [CartController::class, 'deleteCart'])->name('delete-cart');
    Route::post('update-quantity', [CartController::class, 'updateQuantity'])->name('update-quantity');
    Route::get('delete-all', [CartController::class, 'deleteAll'])->name('delete-all');
    Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax'])->name('add-cart-ajax');
 //@checkout
    Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
    Route::post('save-checkout', [CheckoutController::class, 'save'])->name('save-checkout');
    Route::get('payment', [CheckoutController::class, 'payment'])->name('payment');
    Route::post('order-place', [CheckoutController::class, 'order'])->name('order-place');
    Route::post('order-ship', [CheckoutController::class, 'ship'])->name('order-ship');
    Route::post('caculate-ship', [CheckoutController::class, 'caculate_ship'])->name('caculate-ship');
    //@coupon
    Route::post('check_coupon', [CheckoutController::class, 'check_coupon'])->name('check_coupon');
    //@history for buy goods
    Route::get('history', [CartController::class, 'getHistory'])->name('history');
    Route::get('history_detail/{id}', [CartController::class, 'history_detail'])->name('history_detail');
    Route::get('history_detail_delete/{id}/{detail_id}', [CartController::class, 'delete_detail'])->name('history_detail_delete');
    Route::post('update_order_info', [CartController::class, 'update_order_info'])->name('update_order_info');
    Route::post('update_order_detail', [CartController::class, 'update_order_detail'])->name('update_order_detail');

 //@login-logout
    Route::get('login', [CustomerController::class, 'login'])->name('login');
    Route::post('to-login', [CustomerController::class, 'toLogin'])->name('to-login');
    Route::post('login', [CustomerController::class, 'store']);
    Route::get('logout', [CustomerController::class, 'logout'])->name('logout');

//Backend
Route::get('/admin-login', [AdminController::class, 'adminLogin'])->name('admin-login');
Route::post('/admin-login', [AdminController::class, 'login']);
Route::get('/admin-logout', [AdminController::class, 'logout'])->name('admin-logout');

Route::middleware('admin_auth')->name('admin.')->prefix('admin')->group(function(){
    Route::view('/', 'admin.dashboard');
    Route::get('dashboard', [AdminController::class, 'show_dashboard'])->name('dashboard');
    Route::name('categories.')->prefix('categories')->group(function(){
        Route::get('/', [CategoryProduct::class, 'index'])->name('index');
        Route::get('create', [CategoryProduct::class, 'create'])->name('create');
        Route::post('store', [CategoryProduct::class, 'store'])->name('store');
        Route::get('active/{id}', [CategoryProduct::class, 'active'])->name('active');
        Route::get('edit/{id}', [CategoryProduct::class, 'edit'])->name('edit');
        Route::post('update', [CategoryProduct::class, 'update'])->name('update');
        Route::get('delete/{id}', [CategoryProduct::class, 'delete'])->name('delete');

        //validate name exist
        Route::get('checkNameExist', [CategoryProduct::class, 'checkExist'])->name('check-name-exist');
        Route::get('checkEmailExist', [CategoryProduct::class, 'checkName'])->name('check-name');
    });
    Route::name('branches.')->prefix('branches')->group(function(){
        Route::get('/', [BranchController::class, 'index'])->name('index');
        Route::get('create', [BranchController::class, 'create'])->name('create');
        Route::post('store', [BranchController::class, 'store'])->name('store');
        Route::get('active/{id}', [BranchController::class, 'active'])->name('active');
        Route::get('edit/{id}', [BranchController::class, 'edit'])->name('edit');
        Route::post('update', [BranchController::class, 'update'])->name('update');
        Route::get('delete/{id}', [BranchController::class, 'delete'])->name('delete');

        //validate name exist
        Route::get('checkNameExist', [BranchController::class, 'checkExist'])->name('check-name-exist');
        Route::get('checkEmailExist', [BranchController::class, 'checkName'])->name('check-name');
    });

    Route::name('products.')->prefix('products')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('index');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::get('active/{id}', [ProductController::class, 'active'])->name('active');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('edit');
        Route::post('update', [ProductController::class, 'update'])->name('update');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('delete');

        //validate name exist
        Route::get('checkNameExist', [ProductController::class, 'checkExist'])->name('check-name-exist');
        Route::get('checkEmailExist', [ProductController::class, 'checkName'])->name('check-name');
    });

    Route::name('users.')->prefix('users')->group(function(){
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('create', [AdminController::class, 'create'])->name('create');
        Route::post('store', [AdminController::class, 'store'])->name('store');
        Route::get('edit/{id}', [AdminController::class, 'edit'])->name('edit');
        Route::post('update', [AdminController::class, 'update'])->name('update');
        Route::get('delete/{id}', [AdminController::class, 'delete'])->name('delete');
        Route::get('change-password', [AdminController::class, 'changePassword_view'])->name('view-change');
        Route::post('change-password', [AdminController::class, 'changePassword']);
        //validate name exist
        // Route::get('checkNameExist', [AdminController::class, 'checkExist'])->name('check-name-exist');
        // Route::get('checkEmailExist', [AdminController::class, 'checkName'])->name('check-name');
    });

    Route::name('roles.')->prefix('roles')->group(function(){
        Route::get('/', [RoleController::class, 'index'])->name('index');
        Route::get('create', [RoleController::class, 'create'])->name('create');
        Route::post('store', [RoleController::class, 'store'])->name('store');
        Route::get('active/{id}', [RoleController::class, 'active'])->name('active');
        Route::get('edit/{id}', [RoleController::class, 'edit'])->name('edit');
        Route::post('update', [RoleController::class, 'update'])->name('update');
        Route::get('delete/{id}', [RoleController::class, 'delete'])->name('delete');
        Route::get('show/{id}', [RoleController::class, 'show'])->name('show');
        //validate name exist
        // Route::get('checkNameExist', [BranchController::class, 'checkExist'])->name('check-name-exist');
        // Route::get('checkEmailExist', [BranchController::class, 'checkName'])->name('check-name');
    });
    
    Route::name('orders.')->prefix('orders')->group(function(){
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('edit/{id}', [OrderController::class, 'edit'])->name('edit');
        Route::post('edit', [OrderController::class, 'update'])->name('update');
        Route::get('detail/{id}', [OrderController::class, 'detail'])->name('detail');
        Route::get('delete/{id}', [OrderController::class, 'delete'])->name('delete');

        Route::post('update_order_detail', [OrderController::class, 'update_order_detail'])->name('update_order_detail');
        Route::get('delete_order_detail/{id}/{detail_id}', [OrderController::class, 'delete_detail'])->name('delete_order_detail');
    });

    Route::name('coupons.')->prefix('coupons')->group(function(){
        Route::get('/', [CouponController::class, 'index'])->name('index');
        Route::get('create', [CouponController::class, 'create'])->name('create');
        Route::post('store', [CouponController::class, 'store'])->name('store');
        Route::get('edit/{id}', [CouponController::class, 'edit'])->name('edit');
        Route::post('update', [CouponController::class, 'update'])->name('update');
        Route::get('delete/{id}', [CouponController::class, 'delete'])->name('delete');
    });

    Route::name('ships.')->prefix('ships')->group(function(){
        Route::post('/', [ShipController::class, 'index'])->name('index');
        Route::get('create', [ShipController::class, 'create'])->name('create');
        Route::post('store', [ShipController::class, 'store'])->name('store');
        Route::post('store-fee', [ShipController::class, 'store_fee'])->name('store-fee');
        Route::post('update', [ShipController::class, 'update'])->name('update');
        
    });

    
});