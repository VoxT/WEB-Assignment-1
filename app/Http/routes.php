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
use App\Comment;

Route::auth();

Route::get('/', function () {
    return redirect('home');
});

Route::post('product/comment','PagesController@insertComment');

Route::get('manager/products', 'AdminController@products');

Route::get('manager/user', 'AdminController@user');

Route::get('manager/user/uid={userId}', 'AdminController@userInfo');

Route::get('manager/user/duid={userId}', 'AdminController@deleteUser');

Route::get('manager', 'AdminController@wellcome');

Route::get('manager/order/newOrder', 'AdminController@newOrder');

Route::get('manager/order/shipOrder', 'AdminController@shipOrder');

Route::get('manager/order/completeOrder', 'AdminController@completeOrder');

Route::get('manager/order', 'AdminController@order');

Route::get('hotproduct', 'PagesController@hotproduct');

Route::get('search', 'PagesController@search');

Route::get('tragop', 'PagesController@muatragop');

Route::get('order/muatragop/pid={productId}', 'OrderController@muatragop');

Route::get('viewOrder-{orderId}', 'OrderController@viewOrder');

Route::post('userinfo/deleteOrder', 'OrderController@deleteOrder');

Route::post('userinfo/password', 'UserController@updatePassword');

Route::post('userinfo/', 'UserController@updateInfo');

Route::get('userinfo', 'PagesController@userInfo');

Route::get('order/pid={productId}', 'OrderController@showOrderForm');

Route::post('order/pid={productId}', 'OrderController@order');

Route::get('product/band={categoryId}', 'PagesController@showProductsByBand');

Route::get('product-{categoryId}', 'PagesController@showCategoryProducts');

Route::get('product/{productId}', 'PagesController@productInfo');

Route::get('about', 'PagesController@about');

Route::get('/contact', 'PagesController@contact');

Route::get('home', 'PagesController@showAllProducts');

Route::get('social/login/redirect/{provider}', ['uses' => 'Auth\AuthController@redirectToProvider', 'as' => 'social.login']);
Route::get('social/login/{provider}', 'Auth\AuthController@handleProviderCallback');