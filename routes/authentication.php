<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ResetPasswordController;

Route::middleware('guest')->prefix('register')->as('register.')->group(function(){
   Route::get('/', [RegisterController::class, 'index'])->name('index');
   Route::post('/store', [RegisterController::class, 'store'])->name('store');
});
Route::middleware('guest')->prefix('login')->as('login.')->group(function (){
    Route::get('/', [LoginController::class, 'index'])->name('index');
    Route::post('/store', [LoginController::class, 'store'])->name('store');
});

Route::get('/logout', [LogoutController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('guest')->prefix('forget-password')->as('forget.')->group(function (){
   Route::get('/', [ForgetPasswordController::class, 'index'])->name('index');
   Route::post('/store', [ForgetPasswordController::class, 'store'])->name('store');
});

Route::middleware('guest')->prefix('reset-password')->as('password.')->group(function (){
    Route::get('/reset-password', [ResetPasswordController::class, 'index'])->middleware('guest')->name('reset');
    Route::post('/reset-password/update', [ResetPasswordController::class, 'store'])->middleware('guest')->name('update');
});


