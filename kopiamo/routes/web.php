<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

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

// Route::get('/', [PageController::class, 'index']);

// Route::get('/login',[PageController::class, 'login']);

Route::get('/', function(){
    return view ('login');
});

Route::get('/jslogin', function(){
    return view ('jslogin');
});

Route::get('/registration', function(){
    return view ('registration');
});

Route::get('/index', function(){
    return view ('index');
});

Route::get('/logout', function(){
    return view ('logout');
});

Route::get('/process', function(){
    return view ('process');
});

Route::get('/profile', function(){
    return view ('profile');
});

Route::get('/updateprofile', function(){
    return view ('updateprofile');
});