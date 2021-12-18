<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\ForgotPassword;
use App\Http\Controllers\Web\Home;
use App\Http\Controllers\Web\WebController;
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

// Route::get('/', function () {
//     return view('index.home');
// });

Route::get('/', [Home::class, 'home'])->name('home');

Route::get('register', [AuthController::class, 'showFormRegister'])->name('show-form-register');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('show-form-login');
Route::post('login', [AuthController::class, 'login'])->name('login');
//Password reset
Route::get('forget-password', [ForgotPassword::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPassword::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPassword::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPassword::class, 'submitResetPasswordForm'])->name('reset.password.post');

Route::get('contact', [Home::class, 'contact'])->name('contact');
//
Route::middleware('checklogin')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('profile', [AuthController::class, 'showProfile'])->name('show-profile');
    Route::put('profile', [AuthController::class, 'profile'])->name('profile');

    Route::get('get-product/{id}', [Home::class, 'getProduct'])->name('index.get-product');
    Route::get('buy/{id}', [Home::class, 'buy'])->name('index.buy');
    Route::post('buy-product/{id}', [Home::class, 'buyProduct'])->name('index.buy-product');
    Route::get('bill', [Home::class, 'bill'])->name('index.bill');
    // Route::post('bill-received/{id}', [Home::class, 'billReceived'])->name('index.bill-received');
    Route::get('cart', [Home::class, 'getCart'])->name('index.cart');
    Route::post('buy-cart/{id}', [Home::class, 'buyCart'])->name('index.buy-cart');
    Route::get('add-address/{id}', [Home::class, 'addAddress'])->name('index.add-address');
    Route::post('store-address/{id}', [Home::class, 'storeAddress'])->name('index.store-address');
    Route::post('store-comment', [Home::class, 'storeComment'])->name('index.store-comment');
    Route::get('get-inforcheckout', [Home::class, 'getInfoCheckout'])->name('index.get-inforcheckout');
    Route::post('store-inforcheckout/{id}', [Home::class, 'storeInfoCheckout'])->name('index.store-inforcheckout');
    Route::get('search-product', [Home::class, 'searchProduct'])->name('search-product');
    //
    Route::post('store-order', [WebController::class, 'storeOrder'])->name('store-order');
    Route::post('cancel-cart/{id}', [Home::class, 'cancelCart'])->name('index.cancel-cart');

    Route::get('news', [Home::class, 'news'])->name('index.news');
    Route::get('single-news/{id}', [Home::class, 'singleNews'])->name('index.single-news');

    Route::get('list-products/{id}', [Home::class, 'listProducts'])->name('index.list-products');
});

Route::prefix('admin')->middleware('admin')->group(function() {
    Route::get('/', [WebController::class, 'admin'])->name('admin');

    Route::get('category', [WebController::class, 'category'])->name('category');
    Route::get('create-category', [WebController::class, 'createCategory'])->name('create-category');
    Route::post('store-category', [WebController::class, 'storeCategory'])->name('store-category');
    Route::get('edit-category/{id}', [WebController::class, 'editCategory'])->name('edit-category');
    Route::put('update-category/{id}', [WebController::class, 'updateCategory'])->name('update-category');
    Route::get('delete-category/{id}', [WebController::class, 'deletecategory'])->name('delete-category');

    Route::get('product', [WebController::class, 'product'])->name('product');
    Route::get('get-product/{id}', [WebController::class, 'getProduct'])->name('get-product');
    Route::get('create-product', [WebController::class, 'createProduct'])->name('create-product');
    Route::post('store-product', [WebController::class, 'storeProduct'])->name('store-product');
    Route::get('edit-product/{id}', [WebController::class, 'editProduct'])->name('edit-product');
    Route::put('update-product/{id}', [WebController::class, 'updateProduct'])->name('update-product');
    Route::get('delete-product/{id}', [WebController::class, 'deleteProduct'])->name('delete-product');

    Route::get('get-order', [WebController::class, 'getOrder'])->name('get-order');
    // Route::get('create-order', [WebController::class, 'createorder'])->name('create-order');
    // Route::post('store-order', [WebController::class, 'storeOrder'])->name('store-order');
    // Route::get('edit-order', [WebController::class, 'editorder'])->name('edit-order');
    // Route::put('update-order', [WebController::class, 'createorder'])->name('create-order');
    Route::get('delete-order/{id}', [WebController::class, 'deleteOrder'])->name('delete-order');

    Route::get('news', [WebController::class, 'news'])->name('news');
    Route::get('create-news', [WebController::class, 'createNews'])->name('create-news');
    Route::post('store-news', [WebController::class, 'storeNews'])->name('store-news');
    Route::get('edit-news/{id}', [WebController::class, 'editNews'])->name('edit-news');
    Route::put('update-news/{id}', [WebController::class, 'updateNews'])->name('update-news');
    Route::get('delete-news/{id}', [WebController::class, 'deleteNews'])->name('delete-news');
});

