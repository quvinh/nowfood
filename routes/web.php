<?php

use App\Http\Controllers\AuthController;
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
Route::get('get-product/{id}', [Home::class, 'getProduct'])->name('index.get-product');
Route::get('buy/{id}', [Home::class, 'buy'])->name('index.buy');
Route::post('buy-product/{id}', [Home::class, 'buyProduct'])->name('index.buy-product');
Route::get('bill/{id}', [Home::class, 'bill'])->name('index.bill');
Route::get('cart', [Home::class, 'getCart'])->name('index.cart');
Route::post('buy-cart/{id}', [Home::class, 'buyCart'])->name('index.buy-cart');
Route::get('add-address/{id}', [Home::class, 'addAddress'])->name('index.add-address');
Route::post('store-address/{id}', [Home::class, 'storeAddress'])->name('index.store-address');
Route::post('store-comment', [Home::class, 'storeComment'])->name('index.store-comment');

Route::get('register', [AuthController::class, 'showFormRegister'])->name('show-form-register');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('show-form-login');
Route::post('login', [AuthController::class, 'login'])->name('login');
//
Route::middleware('checklogin')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('profile', [AuthController::class, 'showProfile'])->name('show-profile');
    Route::put('profile', [AuthController::class, 'profile'])->name('profile');
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
});

Route::post('store-order', [WebController::class, 'storeOrder'])->name('store-order');
