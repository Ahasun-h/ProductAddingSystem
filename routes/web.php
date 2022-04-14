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

/* frontend website route */
Route::group(['namespace' => 'FrontEnd'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('product/{id}', 'HomeController@singleProduct')->name('single.product');
    Route::get('product/variant','UserController@getProductVariant');
});

/* admin panel route */
Route::group(['namespace' => 'Backend'], function () {

    Route::group(['middleware' => ['registeredUser']], function () {

        // Login
        Route::get('login', 'AuthController@showLoginForm')->name('login.show');
        Route::post('login', 'AuthController@handleLogin')->name('login');
 
    });

    // Admin Routs after login
    Route::group(['middleware' => ['auth','user', 'preventBackHistory']], function () {
        // Dashboard
        Route::get('dashboard', 'DashboardController@dashboard')->name('dashboard');

        // User logout
        Route::post('logout', 'AuthController@logout')->name('logout');

        // Product Routes
        Route::get('add-product', 'ProductController@addProduct')->name('add.product');
        Route::post('store-product', 'ProductController@storeProduct')->name('store.product');
        Route::get('products', 'ProductController@allProducts')->name('all.product');
        Route::get('delete-products/{id}', 'ProductController@deleteProducts')->name('delete.product');
    });

});


