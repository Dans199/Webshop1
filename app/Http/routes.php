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

Route::get('/', [
    'as' => 'Main', 'uses' => 'WelcomeController@index'
]);

Route::get('/veikals', [
    'as' => 'veikals', 'uses' => 'VeikalsController@index'
]);

Route::get('/piegade', [
    'as' => 'piegade', 'uses' => 'PiegadeController@index'
]);
Route::get('/serviss', [
    'as' => 'serviss', 'uses' => 'ServissController@index'
]);

Route::get('/kontakti', [
    'as' => 'kontakti', 'uses' => 'kontaktiController@index'
]);


Route::get('home', 'HomeController@index');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::group(array('prefix' => '/veikls'), function()
{
	Route::get('/category/{id}', array('uses' => 'VeikalsController@category', 'as' => 'shop-category'));
	Route::get('/product/{id}', array('uses' => 'VeikalsController@product', 'as' => 'shop-product'));
	Route::get('/product_info/{id}', array('uses' => 'VeikalsController@product_info', 'as' => 'product-info'));

});

Route::group(['middleware' => 'auth'], function()
{
    	Route::get('/cart', array('uses' => 'CartController@getCart', 'as' => 'cart'));

		Route::get('/cart/Add/{id}', array('uses' => 'CartController@addCart', 'as' => 'add-cart'));
		Route::get('/cart/delete/{id}', array('uses' => 'CartController@deleteCart', 'as' => 'delete-cart'));

		Route::get('/order', array('uses' => 'OrderController@getOrder', 'as' => 'cart-order'));

		Route::post('/order', array('uses' => 'OrderController@postOrder', 'as' => 'cart-order-post'));

		Route::get('/order/done', array('uses' => 'OrderController@getOrderDone', 'as' => 'cart-order-done'));



});


	Route::group(array('before' => 'admin'), function()
	{
		Route::get('/admin', array('uses' => 'Admin\HelloController@showPanel', 'as' => 'Admin'));

	});