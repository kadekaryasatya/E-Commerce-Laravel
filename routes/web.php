<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourierController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\ShopcartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\User\TransactionController;
use App\Http\Controllers\Admin\DetailCategoryController;
use App\Http\Controllers\Admin\DiscountController;
use App\Models\Transaction;

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
//Another

Route::get('/', function () {
    return view('welcome');

})->name('landing');
Auth::routes(['verify' => true]);
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

//ROUTE USER


//Route Product
Route::get('user/product', [DashboardController::class, 'index'])->name('product');
Route::get('user/product/{id}' , [DashboardController::class, 'detailProduct']);

//Route cart
Route::get('user/shopcart', [ShopcartController::class, 'index'])->name('shopcart');
Route::post('cart/{id}',[ShopcartController::class, 'addprocess']);
Route::patch('cart/update/{id}',[ShopcartController::class, 'updateqty']);
Route::delete('cart/delete/{id}', [ShopcartController::class, 'delete']);

//Route Transaction
Route::get('user/transaction', [TransactionController::class, 'list'])->name('list');
Route::post('user/purchase', [TransactionController::class, 'index'])->name('transaction');
Route::post('user/purchase/save', [TransactionController::class, 'purchase_save'])->name('purchase_save');
Route::get('user/proof/{id}',[TransactionController::class, 'proof']);
Route::patch('user/proof/{id}', [TransactionController::class, 'proofadd']);
//Route::post('cart/{id}',[ShopcartController::class, 'addprocess']);
//Route::patch('cart/update/{id}',[ShopcartController::class, 'updateqty']);
//Route::delete('cart/delete/{id}', [ShopcartController::class, 'delete']);

//Shiping
Route::post('user/shippingcost', [TransactionController::class, 'get_cost'])->name('get_cost');



//Login ADMIN
Route::get('/admin', [LoginAdminController::class, 'loginAdmin'])->name('loginadmin');
Route::post('actionlogin', [LoginAdminController::class, 'action'])->name('actionlogin');

//Route ADMIN
Route::group(['middleware' => 'auth:admin'], function() {
Route::get('/dashboard', [HomeController::class, 'indexadmin'])->name ('dashboard');
Route::get('logoutAdmin', [LoginAdminController::class, 'logoutAdmin'])->name('logoutadmin');

 //Kategori Route
Route::get('admin/kategori/list', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('listkategori');
Route::get('admin/kategori/add', [App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('addkategori');
Route::post('admin/kategori', [App\Http\Controllers\Admin\CategoryController::class, 'addprocess']);
Route::get('admin/kategori/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
Route::patch('admin/kategori/editproses/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'editprocess']);
Route::delete('admin/kategori/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'delete']);

//Detail Kategori Route
Route::get('admin/detailkategori/list', [App\Http\Controllers\Admin\DetailCategoryController::class, 'index'])->name('listdetcategory');
// Route::get('admin/detailkategori/add', [App\Http\Controllers\Admin\DetailCategoryController::class, 'add'])->name('adddetailkategori');
// Route::post('admin/detailkategori', [App\Http\Controllers\Admin\DetailCategoryController::class, 'addprocess']);
// Route::get('admin/detailkategori/edit/{id}', [App\Http\Controllers\Admin\DetailCategoryController::class, 'edit']);
// Route::patch('admin/detailkategori/editproses/{id}', [App\Http\Controllers\Admin\DetailCategoryController::class, 'editprocess']);
// Route::delete('admin/detailkategori/{id}', [App\Http\Controllers\Admin\DetailCategoryController::class, 'delete']);

//Product Route
Route::get('admin/product', [ProductController::class, 'index'])->name('listproduct');
Route::get('admin/product/add', [ProductController::class, 'add']);
Route::post('admin/product', [ProductController::class, 'addprocess']);
Route::get('admin/product/edit/{id}',[ProductController::class, 'edit']);
Route::patch('admin/product/editproses/{id}', [ProductController::class, 'editprocess']);
Route::delete('admin/product/{id}', [ProductController::class, 'delete']);

//Admin Route
Route::get('admin/list', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('listadmin');
Route::get('admin/add', [App\Http\Controllers\Admin\AdminController::class, 'add'])->name('addadmin');
Route::post('admin/admin', [App\Http\Controllers\Admin\AdminController::class, 'addprocess']);
Route::get('admin/edit/{id}', [App\Http\Controllers\Admin\AdminController::class, 'edit']);
Route::patch('admin/editproses/{id}', [App\Http\Controllers\Admin\AdminController::class, 'editprocess']);
Route::delete('admin/{id}', [App\Http\Controllers\Admin\AdminController::class, 'delete']);

//Courier Route
Route::get('admin/courier', [CourierController::class, 'index'])->name('listcourier');
Route::get('admin/courier/add', [CourierController::class, 'add'])->name('addcourier');
Route::post('admin/courier', [CourierController::class, 'addprocess']);
Route::get('admin/courier/edit/{id}', [CourierController::class, 'edit']);
Route::patch('admin/courier/editprocess/{id}', [CourierController::class, 'editprocess']);
Route::delete('admin/courier/{id}', [CourierController::class, 'delete']);

//Discount Route
Route::get('admin/discount', [DiscountController::class, 'index'])->name('listdiscount');
Route::get('admin/discount/add', [DiscountController::class, 'add'])->name('adddiscount');
Route::post('admin/discount', [DiscountController::class, 'addprocess']);
Route::get('admin/discount/edit/{id}', [DiscountController::class, 'edit']);
Route::patch('admin/discount/editprocess/{id}', [DiscountController::class, 'editprocess']);
Route::delete('admin/discount/{id}', [DiscountController::class, 'delete']);

});
