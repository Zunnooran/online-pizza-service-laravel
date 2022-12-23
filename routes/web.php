<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\imageUpload;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

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
Route::get('/home', [HomeController::class,'show'])->name('home');
Route::get('/', [HomeController::class,'show'])->name('home');

Route::get('/contact',[ContactController::class,'index'])->name('contact');
Route::post('/contact',[ContactController::class,'create'])->name('contact');

Route::get('/read',[ContactController::class,'show'])->name('read');
Route::get('/edit/{id}',[ContactController::class,'edit'])->name('edit');
Route::put('/edit/{id}',[ContactController::class,'update'])->name('update');
Route::get('/delete/{id}',[ContactController::class,'destroy'])->name('delete');



//############### Admin ################
 
 Route::get('admin',[AdminController::class,'login'])->name('admin');
 Route::post('admin',[AdminController::class,'create'])->name('admin.post');
 Route::get('admin/dashboard',[AdminController::class,'index'])->name('admin-dashboard')->middleware('admin-auth');
 Route::get('admin/logout',[AdminController::class,'logout'])->name('admin.logout');

// ########################### add pizza #################

Route::get('/a_pizza',[imageUpload::class,'index'])->name('a.pizza')->middleware('admin-auth');

Route::get('add-pizza', [ imageUpload::class, 'imageUpload' ])->name('add-pizza')->middleware('admin-auth');
Route::post('add-pizza', [ imageUpload::class, 'imageUploadPost' ])->name('add-pizza.post');

Route::get('/p.edit/{id}',[imageUpload::class,'edit'])->name('p.edit');
Route::put('/p.edit/{id}',[imageUpload::class,'update'])->name('p.update.put');
Route::get('/p.show/{id}',[imageUpload::class,'show'])->name('p.show');

Route::get('/p.delete/{id}',[imageUpload::class,'destroy'])->name('p.delete');

//######################### drinks ##################
Route::resource('drinks',DrinkController::class)->middleware('admin-auth');
Route::resource('deals',DealController::class)->middleware('admin-auth');

// ####################### cart ###############
Route::get('/cart-deal/{id}',[CartController::class,'create_deal'])->name('cart.create_deal')->middleware('auth');
Route::get('/cart-pizza/{id}',[CartController::class,'create_pizza'])->name('cart.create_pizza')->middleware('auth');
Route::get('/cart-drink/{id}',[CartController::class,'create_drink'])->name('cart.create_drink')->middleware('auth');
Route::get('/cart',[CartController::class,'index'])->name('cart.index')->middleware('auth');
Route::get('/delete/{id}',[CartController::class,'destroy'])->name('delete')->middleware('auth');


Route::get('cart/payment',[CartController::class,'payment'])->name('payment')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
