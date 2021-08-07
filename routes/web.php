<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
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

 //@cart
    Route::get('show-cart', [CartController::class, 'showCart'])->name('show-cart');
    Route::post('add-cart', [CartController::class, 'addCart'])->name('add-cart');
    Route::get('delete-cart/{id}', [CartController::class, 'deleteCart'])->name('delete-cart');
    Route::post('update-quantity', [CartController::class, 'updateQuantity'])->name('update-quantity');
 //@checkout
 Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
 Route::post('save-checkout', [CheckoutController::class, 'save'])->name('save-checkout');
 Route::get('payment', [CheckoutController::class, 'payment'])->name('payment');
 Route::post('order-place', [CheckoutController::class, 'order'])->name('order-place');

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
        Route::get('detail/{id}', [OrderController::class, 'detail'])->name('detail');
        Route::get('delete/{id}', [OrderController::class, 'delete'])->name('delete');
    });

    
});