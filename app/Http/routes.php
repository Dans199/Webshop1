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

		Route::get('/admin/groups', array('uses' => 'Admin\GrupasController@showGroups', 'as' => 'Admin-grupas'));
		Route::get('/admin/groups/add', array('uses' => 'Admin\GrupasController@AddGroup', 'as' => 'Admin-grupas-add'));
		Route::post('/admin/groups/add', array('uses' => 'Admin\GrupasController@postGroup'));
		Route::get('/admin/groups/delete/{id}', array('uses' => 'Admin\GrupasController@DeleteGroup', 'as' => 'Admin-grupas-delete'));
		Route::get('/admin/groups/edit/{id}', array('uses' => 'Admin\GrupasController@getEdit', 'as' => 'Admin-grupas-edit'));
		Route::post('/admin/groups/edit/{id}', array('uses' => 'Admin\GrupasController@postEdit'));

		Route::get('/admin/Categories', array('uses' => 'Admin\CategoryController@showCategory', 'as' => 'Admin-category'));
		Route::get('/admin/Categories/add', array('uses' => 'Admin\CategoryController@AddCategory', 'as' => 'Admin-category-add'));
		Route::post('/admin/Categories/add', array('uses' => 'Admin\CategoryController@postCategory'));
		Route::get('/admin/Categories/edit/{id}', array('uses' => 'Admin\CategoryController@EditCategory', 'as' => 'Admin-category-edit'));
		Route::post('/admin/Categories/edit/{id}', array('uses' => 'Admin\CategoryController@postEdit'));

		Route::get('/admin/Products', array('uses' => 'Admin\ProductsController@showProducts', 'as' => 'Admin-Products'));
		Route::get('/admin/Products/add', array('uses' => 'Admin\ProductsController@AddProducts', 'as' => 'Admin-Products-add'));

	});