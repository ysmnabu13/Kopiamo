<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\AboutUsController;

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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {return view('dashboard');})->name('dashboard');

// Route::resource('menu', \App\Http\Controllers\MenuController::class);


// Group everything into one middleware
Route::group(['middleware' => ['auth:sanctum', 'verified']], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('menu', MenuController::class);
    Route::resource('order', OrderController::class);
    Route::get('/search', [MenuController::class, 'search']);
    Route::resource('cart', CartController::class);
    Route::get('payment', [OrderController::class, 'checkout'])->name('payment');
    Route::get('aboutus', [AboutUsController::class, 'index'])->name('aboutus');
});