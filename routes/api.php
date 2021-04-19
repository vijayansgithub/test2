<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
Route::post('login', [App\Http\Controllers\PassportController::class,'login']);
Route::post('register', [App\Http\Controllers\PassportController::class,'register']);
//Route::get('user', [App\Http\Controllers\PassportController::class,'details']);
 

Route::middleware('auth:api')->group(function () {
    Route::get('user', [App\Http\Controllers\PassportController::class,'details']);
 
    Route::resource('products', App\Http\Controllers\ProductController::class);
});

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
