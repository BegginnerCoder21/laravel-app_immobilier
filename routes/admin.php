<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\City\MainCityController;
use App\Http\Controllers\Admin\City\StoreCityController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainCategoryController;
use App\Http\Controllers\Admin\StoreCategoryController;
use App\Http\Controllers\Admin\UpdateCategoryController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

Route::prefix('admin')->middleware('auth:admin')->group(function(){

    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('main_categories')->group(function(){
        
        Route::controller(MainCategoryController::class)->group(function (){
            Route::get('/','index')->name('admin.categories');
            Route::get('create','create')->name('admin.categories.create');
            Route::get('edit/{id}','edit')->name('admin.categories.edit');
            Route::get('delete/{id}','delete')->name('admin.categories.delete');
        });
        Route::post('store',[StoreCategoryController::class,'store'])->name('admin.categories.store');
        Route::post('update{id}',[UpdateCategoryController::class,'update'])->name('admin.categories.update');

    });

    Route::prefix('cities')->group(function(){

        Route::controller(MainCityController::class)->group(function (){
            Route::get('/','index')->name('admin.cities');
            Route::get('create','create')->name('admin.cities.create');
            Route::get('edit/{id}','edit')->name('admin.cities.edit');
            Route::get('delete/{id}','delete')->name('admin.cities.delete');
        });
        Route::middleware('isActive')->post('store',[StoreCityController::class,'store'])->name('admin.cities.store');
        Route::post('update{id}',[UpdateCategoryController::class,'update'])->name('admin.cities.update');

    });

    
});

Route::prefix('admin')->middleware('guest:admin')->group(function () {

    Route::controller(LoginController::class)->group(function(){

        Route::get('/login', 'getLogin')->name('get.admin.login');
        Route::post('/login', 'login')->name('admin.login');

    });
});

});
