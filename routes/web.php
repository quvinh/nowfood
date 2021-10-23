<?php

use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [AuthController::class, 'showFormRegister'])->name('show-form-register');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('show-form-login');
Route::post('login', [AuthController::class, 'login'])->name('login');
//
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('profile', [AuthController::class, 'showProfile'])->name('show-profile');
Route::put('profile', [AuthController::class, 'profile'])->name('profile');

Route::get('category', [WebController::class, 'category'])->name('category');
Route::get('create-category', [WebController::class, 'createCategory'])->name('create-category');
Route::post('store-category', [WebController::class, 'storeCategory'])->name('store-category');
Route::get('edit-category', [WebController::class, 'editCategory'])->name('edit-category');
Route::put('update-category', [WebController::class, 'updateCategory'])->name('update-category');
Route::get('delete-category', [WebController::class, 'deletecategory'])->name('delete-category');

Route::get('product', [WebController::class, 'product'])->name('product');
Route::get('get-product', [WebController::class, 'getProduct'])->name('get-product');
Route::get('create-product', [WebController::class, 'createProduct'])->name('create-product');
Route::post('store-product', [WebController::class, 'storeProduct'])->name('store-product');
Route::get('edit-product', [WebController::class, 'editProduct'])->name('edit-product');
Route::put('update-product', [WebController::class, 'createProduct'])->name('create-product');
Route::get('delete-product', [WebController::class, 'deleteProduct'])->name('delete-product');

Route::get('get-order', [WebController::class, 'getorder'])->name('get-order');
// Route::get('create-order', [WebController::class, 'createorder'])->name('create-order');
// Route::post('store-order', [WebController::class, 'storeorder'])->name('store-order');
// Route::get('edit-order', [WebController::class, 'editorder'])->name('edit-order');
// Route::put('update-order', [WebController::class, 'createorder'])->name('create-order');
Route::get('delete-order', [WebController::class, 'deleteorder'])->name('delete-order');
