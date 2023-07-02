<?php

use App\Http\Controllers\APIMenuController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('/menus', [APIMenuController::class, 'store']);
// Route::resource('menus', APIMenuController::class);

//Public
Route::get('menus', [APIMenuController::class, 'index']);
Route::get('menus/{id}', [APIMenuController::class, 'shoe']);
Route::get('/menus/search/{name}', [APIMenuController::class, 'search']);
Route::post('/register', [AuthController::class, 'register']);

//Protected
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/menus', [APIMenuController::class, 'store']);
    Route::post('/menus/{id}', [APIMenuController::class, 'update']);
    Route::delete('/menus/{id}', [APIMenuController::class, 'destroy']);
    Route::post('/logout', [AuthController::class, 'logout']);

});


Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user();
});
