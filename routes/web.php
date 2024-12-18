<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SslCommerzPaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopGridController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;


//Frontend 
Route::get('/', [ShopGridController::class, 'index'])->name('home');
Route::get('/shop/{id?}', [ShopGridController::class, 'shop'])->name('shop');
Route::get('/shop/sub-category/{id?}', [ShopGridController::class, 'subCategory'])->name('subCategory');
Route::get('/product-details/{id}', [ShopGridController::class, 'productDetails'])->name('product-details');
Route::get('/about', [ShopGridController::class, 'about'])->name('about');
Route::get('/blog', [ShopGridController::class, 'blog'])->name('blog');
Route::get('/contact', [ShopGridController::class, 'contact'])->name('contact');


//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.page');
Route::post('/cart/store/{id}', [CartController::class, 'store'])->name('cart.store');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/content', [CartController::class, 'cartContent'])->name('cart.content');


//checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::get('/checkout/payment', [CheckoutController::class, 'payment'])->name('checkout.payment');
Route::post('/checkout/new-order', [CheckoutController::class, 'newOrder'])->name('checkout.newOrder');
Route::get('/checkout/complete-order', [CheckoutController::class, 'completeOrder'])->name('checkout.complete-order');

//Customer
Route::get('/customer/login-register', [CustomerAuthController::class, 'index'])->name('customer.login-register');
Route::post('/customer/login', [CustomerAuthController::class, 'login'])->name('customer.login');
Route::post('/customer/register', [CustomerAuthController::class, 'register'])->name('customer.register');
Route::get('/customer/dashboard', [CustomerAuthController::class, 'dashboard'])->name('customer.dashboard');
Route::get('/customer/profile', [CustomerAuthController::class, 'profile'])->name('customer.profile');
Route::get('/customer/orders', [CustomerAuthController::class, 'order'])->name('customer.order');
Route::get('/customer/change-password',  [CustomerAuthController::class, 'changePassword'])->name('customer.change-password');
Route::get('/customer/logout',  [CustomerAuthController::class, 'logout'])->name('customer.logout');


// SSLCOMMERZ Start
// Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);



//Backend
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    //Product Tab
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/add', [ProductController::class, 'create'])->name('product.create');
    Route::get('/product/get-sub-category-by-category', [ProductController::class, 'getSubCategoryByCategory'])->name('get-sub-category-by-category');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

    //Category Tab
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/add', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    //Sub-Category Tab
    Route::get('/sub-category', [SubCategoryController::class, 'index'])->name('subcategory.index');
    Route::get('/sub-category/add', [SubCategoryController::class, 'create'])->name('subcategory.create');
    Route::post('/sub-category/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/sub-category/edit/{id}', [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/sub-category/update/{id}', [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/sub-category/delete/{id}', [SubCategoryController::class, 'delete'])->name('subcategory.delete');


    //Brand Tab
    Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
    Route::get('/brand/add', [BrandController::class, 'create'])->name('brand.create');
    Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');
    Route::get('/brand/edit/{id}', [BrandController::class, 'edit'])->name('brand.edit');
    Route::post('/brand/update/{id}', [BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');


    //Unit Tab
    Route::get('/unit', [UnitController::class, 'index'])->name('unit.index');
    Route::get('/unit/add', [UnitController::class, 'create'])->name('unit.create');
    Route::post('/unit/store', [UnitController::class, 'store'])->name('unit.store');
    Route::get('/unit/edit/{id}', [UnitController::class, 'edit'])->name('unit.edit');
    Route::post('/unit/update/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::get('/unit/delete/{id}', [UnitController::class, 'delete'])->name('unit.delete');


    //Order Tab
    Route::get('/order', [AdminOrderController::class, 'index'])->name('order.index');
    Route::get('/order/detail/{id}', [AdminOrderController::class, 'details'])->name('order.details');
    Route::get('/order/edit/{id}', [AdminOrderController::class, 'edit'])->name('order.edit');
    Route::post('/order/edit/{id}', [AdminOrderController::class, 'update'])->name('order.update');
    Route::get('/order/invoice/{id}', [AdminOrderController::class, 'invoice'])->name('order.invoice');
    Route::get('/order/download/{id}', [AdminOrderController::class, 'download'])->name('order.download-invoice');
    Route::get('/order/delete/{id}', [AdminOrderController::class, 'delete'])->name('order.delete');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';