<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerController;

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
Route::view('add/product', 'Admin.addproduct')->name('add.product');
// Route::view('all/customers', 'Admin.customers')->name('all.customers');
// Route::view('dashboard', 'Admin.dashboard')->name('dashboard');
// Route::view('all/products', 'Admin.products')->name('all.products');
Route::view('order/receipt', 'Admin.receipt')->name('order.receipt');
// Route::view('login', 'login')->name('login');
// Route::view('p', 'Customer.product');
// Route::view('signup', 'signup')->name('signup');
// Route::view('creditcard', 'Customer.creditcard')->name('creditcard');
// Route::view('/', 'Customer.home')->name('home');
// Route::view('results', 'customer.results')->name('results');
// Route::view('shoppingcart', 'Customer.shoppingcart')->name('shoppingcart');

///////////////////////////////////////////////////////////////////////////
Route::get('signup', [RegisterationController::class, 'Register'])->name('signup');
Route::post('customer/save', [RegisterationController::class, 'SaveCustomer'])->name('save.customer');
Route::get('login', [RegisterationController::class, 'Login'])->name('login');
Route::post('check/login', [RegisterationController::class, 'CheckLogin'])->name('check.login');
Route::get('logout', [RegisterationController::class, 'Logout'])->name('logout');

Route::get('all/customers', [AdminController::class, 'ShowAllCustomer'])->name('all.customers');
Route::get('dashboard', [AdminController::class, 'ShowRecentCustomer'])->name('dashboard');
// Route::get('dashboard', [AdminController::class, 'ShowRecentProducts'])->name('dashboard');
Route::post('add/product', [AdminController::class, 'AddProduct'])->name('addprod');
Route::get('all/products', [AdminController::class, 'ShowProduct'])->name('all.products');
Route::get('del/product/{id}', [AdminController::class, 'DeleteProduct'])->name('del.product');
Route::get('del/customer/{id}', [AdminController::class, 'DeleteCustomer'])->name('del.customer');
Route::get('all/orders', [AdminController::class, 'AllOrders'])->name('all.orders');
Route::get('receipt/{id}', [AdminController::class, 'showordereceipt'])->name('receipt');

Route::post('results', [HomeController::class, 'search'])->name('search.results');
Route::get('', [HomeController::class, 'showproducts'])->name('home');
Route::get('add/product/to/shoppingcart/{id}',[CustomerController::class, 'addtocart'])->name('cart');
Route::get('shoppingcart', [CustomerController::class, 'showcart'])->name('shoppingcart');
Route::get('remove/item/{id}', [CustomerController::class , 'RemoveItemFromCart'])->name('remove.item');
Route::get('creditcard', [CustomerController::class, 'payment'])->name('creditcard');
Route::post('submit/order', [CustomerController::class, 'checkout'])->name('checkout');
Route::get('product/details/{id}', [HomeController::class, 'showproductdetails'])->name('product.details');

