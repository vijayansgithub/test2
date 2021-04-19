<?php

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

Route::get('/material',[App\Http\Controllers\MaterialController::class,'index']);
Route::get('/material/{id?}',[App\Http\Controllers\MaterialController::class,'edit'])->where("id","[0-9]+");
Route::post('/material/store',[App\Http\Controllers\MaterialController::class,'store']);
Route::post('/material/update',[App\Http\Controllers\MaterialController::class,'update']);
Route::post('/material/delete',[App\Http\Controllers\MaterialController::class,'destroy']);

//Route::resource("/acc_year",App\Http\Controllers\Acc_yearController::class);

Route::get("/test",[App\Http\Controllers\Acc_yearController::class,'index']);

//Route::get("/acc_year/getindex",[App\Http\Controllers\API\curlAcc_yearController::class,"getindex"]);
//Route::post("/acc_year/postindex",[App\Http\Controllers\API\curlAcc_yearController::class,"postindex"]);
Route::resource("/acc_year",App\Http\Controllers\curl\acc_year\Acc_yearController::class);
