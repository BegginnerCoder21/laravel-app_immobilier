<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\City\MainCityController;
use App\Http\Controllers\Admin\City\StoreCityController;
use App\Http\Controllers\Admin\City\UpdateCityController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainCategoryController;
use App\Http\Controllers\Admin\Property\MainPropertyController;
use App\Http\Controllers\Admin\Property\PropertyFeatureController;
use App\Http\Controllers\Admin\Property\PropertyImageController;
use App\Http\Controllers\Admin\Property\PropertyPriceController;
use App\Http\Controllers\Admin\StoreCategoryController;
use App\Http\Controllers\Admin\UpdateCategoryController;
use App\Http\Controllers\Admin\User\MainUserController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {

        Route::prefix('admin')->middleware('auth:admin')->group(function () {

            Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

            Route::prefix('main_categories')->group(function () {

                Route::controller(MainCategoryController::class)->group(function () {
                    Route::get('/', 'index')->name('admin.categories');
                    Route::get('create', 'create')->name('admin.categories.create');
                    Route::get('edit/{id}', 'edit')->name('admin.categories.edit');
                    Route::get('delete/{id}', 'delete')->name('admin.categories.delete');
                });
                Route::middleware('isActive')->group(function () {
                    Route::post('store', [StoreCategoryController::class, 'store'])->name('admin.categories.store');
                    Route::post('update/{id}', [UpdateCategoryController::class, 'update'])->name('admin.categories.update');
                });
            });

            Route::prefix('cities')->group(function () {

                Route::controller(MainCityController::class)->group(function () {
                    Route::get('/', 'index')->name('admin.cities');
                    Route::get('create', 'create')->name('admin.cities.create');
                    Route::get('edit/{id}', 'edit')->name('admin.cities.edit');
                    Route::get('delete/{id}', 'delete')->name('admin.cities.delete');
                });
                Route::middleware('isActive')->group(function () {

                    Route::post('store', [StoreCityController::class, 'store'])->name('admin.cities.store');
                    Route::post('update/{id}', [UpdateCityController::class, 'update'])->name('admin.cities.update');
                });
            });

            Route::prefix('user')->group(function () {

                Route::controller(MainUserController::class)->group(function () {
                    Route::get('/', 'index')->name('admin.users');
                    Route::get('create', 'create')->name('admin.users.create');
                    Route::post('store', 'store')->name('admin.users.store');
                    Route::get('delete/{id}', 'delete')->name('admin.users.delete');
                });
            });

            Route::prefix('properties')->group(function () {

                Route::controller(MainPropertyController::class)->group(function () {
                    Route::get('/', 'index')->name('admin.properties.index');
                    Route::get('create', 'create')->name('admin.properties.general.create');
                    Route::middleware('isActive')->post('store', 'store')->name('admin.properties.general.store');
                    Route::get('edit/{id}', 'edit')->name('admin.properties.edit');
                    Route::post('update/{id}', 'update')->name('admin.properties.update');
                    Route::get('delete/{id}', 'delete')->name('admin.properties.delete');
                    
                });
                
                Route::controller(PropertyPriceController::class)->group(function(){
                    
                    Route::get('price/{id}', 'getPrice')->name('admin.properties.price');
                    Route::post('price/{id}', 'savePropertyPrice')->name('admin.properties.price.store');
                });

                Route::controller(PropertyFeatureController::class)->group(function(){
                    Route::get('feature/{id}', 'getFeature')->name('admin.properties.features');
                    Route::post('feature/{id}', 'savePropertyFeature')->name('admin.properties.features.store');
                });
                
                Route::controller(PropertyImageController::class)->group(function(){
                    
                    Route::get('image/{id}', 'addImages')->name('admin.properties.images');
                    Route::post('image', 'savePropertyImages')->name('admin.properties.images.store');
                    Route::post('image/db/{id}', 'savePropertyImagesDB')->name('admin.properties.images.store.db');

                });
            });
        });

        Route::prefix('admin')->middleware('guest:admin')->group(function () {

            Route::controller(LoginController::class)->group(function () {

                Route::get('/login', 'getLogin')->name('get.admin.login');
                Route::post('/login', 'login')->name('admin.login');
            });
        });
    }
);
