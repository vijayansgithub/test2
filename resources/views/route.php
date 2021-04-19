<?php
use App\Http\Controllers\acc_yearController;
Route::get("/acc_year/{id?}",[acc_yearController::class,"create_page"])->where("id","[0-9]+");
Route::get("/acc_year/report",[acc_yearController::class,"report_page"]);
Route::post("/acc_year/insert",[acc_yearController::class,"insertdata"]);
Route::post("/acc_year/update",[acc_yearController::class,"updatedata"]);
Route::post("/acc_year/delete",[acc_yearController::class,"deletedata"]);
Route::post("/acc_year/list",[acc_yearController::class,"listdata"]);
Route::resource("/acc_year",acc_yearController::class);
Route::get('/password/reset', [App\Http\Controllers\Auth\PasswordResetLinkController::class, 'create'])->name("password.request");Route::post('/password/reset', [App\Http\Controllers\Auth\PasswordResetLinkController::class, 'store'])->name("password.email");Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');Route::post('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout']);Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index']);Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'store']);Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index']);Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'store']);Route::get('/reset-password/{token}', [App\Http\Controllers\Auth\NewPasswordController::class, 'create'])->name('password.reset');Route::post('/reset-password', [App\Http\Controllers\Auth\NewPasswordController::class, 'store'])->name("password.update");
?>