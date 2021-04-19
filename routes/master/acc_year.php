<?php
use App\Http\Controllers\api\Acc_year;

Route::post('login', [App\Http\Controllers\AuthController::class,'login']);
Route::post('register', [App\Http\Controllers\AuthController::class,'register']);

Route::middleware('auth:api')->group(function () {
	Route::get('user', [App\Http\Controllers\AuthController::class,'details']);
	Route::resource('acc_year', App\Http\Controllers\Acc_yearController::class);
});
?>