<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();

Route::get('/', function () {
    return redirect('home');
});

Route::get('viewOrder-{orderId}', 'OrderController@viewOrder');

Route::post('userinfo/deleteOrder', 'OrderController@deleteOrder');

Route::post('userinfo/password', 'UserController@updatePassword');

Route::post('userinfo/', 'UserController@updateInfo');

Route::get('userinfo', 'Pagescontroller@userInfo');

Route::get('order/pid={productId}', 'OrderController@showOrderForm');

Route::post('order/pid={productId}', 'OrderController@order');

Route::get('product/band={categoryId}', 'Pagescontroller@showProductsByBand');

Route::get('product-{categoryId}', 'Pagescontroller@showCategoryProducts');

Route::get('product/{productId}', 'Pagescontroller@productInfo');

Route::get('about', 'Pagescontroller@about');

Route::get('/contact', 'Pagescontroller@contact');

Route::get('home', 'Pagescontroller@showAllProducts');

Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');