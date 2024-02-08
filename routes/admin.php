<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\LoginController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

Route::prefix('admin')->middleware('auth:admin')->group(function(){

    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('main_categories')->controller(\App\Http\Controllers\Admin\MainController::class)->group(function (){
        Route::get('/','index')->name('admin.categories');
        Route::get('create','create')->name('admin.categories.create');
        Route::post('store','store')->name('admin.categories.store');
        Route::get('edit/{id}','edit')->name('admin.categories.edit');
        Route::post('update{id}','update')->name('admin.categories.update');
        Route::get('delete/{id}','delete')->name('admin.categories.delete');

    });
});

Route::prefix('admin')->middleware('guest:admin')->group(function () {


    Route::get('/login', [LoginController::class, 'getLogin'])->name('get.admin.login');
    Route::post('/login',[LoginController::class,'login'])->name('admin.login');
});

});
