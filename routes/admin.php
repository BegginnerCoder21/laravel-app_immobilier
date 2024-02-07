<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth:admin')->group(function(){

    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
});

Route::prefix('admin')->middleware('guest:admin')->group(function () {


    Route::get('/login', [LoginController::class, 'getLogin'])->name('get.admin.login');
    Route::post('/login',[LoginController::class,'login'])->name('admin.login');
});
