<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\CategoryController;
use App\Http\Controllers\user\HomeController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\CheckOutController;
use App\Http\Controllers\user\ContactController;
use App\Http\Controllers\user\BrandController;


// For admin access
Route::get('/admin', 'App\Http\Controllers\AdminController@loginAdmin');
Route::post('/admin', 'App\Http\Controllers\AdminController@postLoginAdmin');


Route::get('/home', function(){
    return view('home');
});


Route::prefix('admin')->group(function(){
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'App\Http\Controllers\CategoryController@index'
        ]);

        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'App\Http\Controllers\CategoryController@create'
        ]);

        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'App\Http\Controllers\CategoryController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'App\Http\Controllers\CategoryController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'App\Http\Controllers\CategoryController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'App\Http\Controllers\CategoryController@delete'
        ]);

    });

    Route::prefix('brands')->group(function () {
        Route::get('/', [
            'as' => 'brands.index',
            'uses' => 'App\Http\Controllers\BrandController@index'
        ]);

        Route::get('/create', [
            'as' => 'brands.create',
            'uses' => 'App\Http\Controllers\BrandController@create'
        ]);

        Route::post('/store', [
            'as' => 'brands.store',
            'uses' => 'App\Http\Controllers\BrandController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'brands.edit',
            'uses' => 'App\Http\Controllers\BrandController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'brands.update',
            'uses' => 'App\Http\Controllers\BrandController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'brands.delete',
            'uses' => 'App\Http\Controllers\BrandController@delete'
        ]);

    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses' => 'App\Http\Controllers\MenuController@index'
        ]);

        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'App\Http\Controllers\MenuController@create'
        ]);

        Route::post('/store', [
            'as' => 'menus.store',
            'uses' => 'App\Http\Controllers\MenuController@store'
        ]);

        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'App\Http\Controllers\MenuController@edit'
        ]);

        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'App\Http\Controllers\MenuController@update'
        ]);

        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'App\Http\Controllers\MenuController@delete'
        ]);

    });

    Route::prefix('products')->group(function () {
        Route::get('/', [
            'as' => 'products.index',
            'uses' => 'App\Http\Controllers\AdminProductController@index'
        ]);

        Route::get('/create', [
            'as' => 'products.create',
            'uses' => 'App\Http\Controllers\AdminProductController@create'
        ]);

        Route::post('/store', [
            'as' => 'products.store',
            'uses' => 'App\Http\Controllers\AdminProductController@store'
        ]);


    });















});







// Route::get('/admin', function() {
//     return view('layouts.admin');
// })




Route::prefix('user')->name('user')->group(function(){

    Route::get('home', [HomeController::class, 'home'])->name('home');

    Route::get('login', [LoginController::class, 'login'])->name('login');

    Route::post('postLogin', [LoginController::class, 'postLogin'])->name('postLogin');

    Route::get('register', [LoginController::class, 'register'])->name('register');

    Route::post('postRegister', [LoginController::class, 'postRegister'])->name('postRegister');

    // Route::get('cart', [CartController::class, 'cart'])->name('cart');

    Route::get('checkout', [CheckOutController::class, 'checkout'])->name('checkout');

    Route::get('contact', [ContactController::class, 'contact'])->name('contact');

    Route::get('brand', [BrandController::class, 'brand'])->name('brand');

});

//Login  google
// Route::get('/login-google','GoogleController@login_google');
// Route::get('/google/callback','GoogleController@callback_google');

Route::get('/user/home','App\Http\Controllers\user\CartController@index');
Route::get('/Add-Cart/{id}','App\Http\Controllers\user\CartController@AddCart');
Route::get('/Delete-Item-Cart/{id}','App\Http\Controllers\user\CartController@DeleteItemCart');
Route::get('/List-Carts','App\Http\Controllers\user\CartController@ViewListCart');
Route::get('/Delete-Item-List-Cart/{id}','App\Http\Controllers\user\CartController@DeleteListItemCart');
Route::get('/Save-Item-List-Cart/{id}/{quanty}','App\Http\Controllers\user\CartController@SaveListItemCart');
