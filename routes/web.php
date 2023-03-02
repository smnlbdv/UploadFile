<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageOperationsController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\Users\UserController;
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
Route::get('/', [ImageOperationsController::class, 'index'])->name('service.index');
Route::prefix('service')->as('service.')->group(function (){
    Route::post('/store', [ImageOperationsController::class, 'store'])->name('store');
});
Route::get('/zip', [ImageOperationsController::class, 'zip'])->name('zip');

Route::middleware(['admin', 'auth'])->namespace('Admin')->prefix('admin')->as('admin.')->group(function (){
    Route::get('/', [AdminPanelController::class, 'index'])->name('index');
});
Route::middleware(['admin', 'auth'])->as('users.')->group(function(){
    Route::resource('/user', UserController::class)->except([
        'show'
    ]);
});

