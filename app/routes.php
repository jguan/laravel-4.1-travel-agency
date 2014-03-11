<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

#Route::get('/', function()
#{
#	return View::make('hello');
#});

Route::get('/', array('uses'=>'HomeController@getIndex'));
Route::get('/tour/{id}', array('uses'=>'HomeController@getTour'));

Route::controller('admin/tours', 'ToursController');
Route::controller('admin/prices', 'PricesController');
Route::controller('admin/photos', 'PhotosController');
Route::controller('users', 'UsersController');

Route::post('orders/create', array('uses'=>'OrdersController@postCreate'));
Route::get('admin/orders', array('uses'=>'OrdersController@getOrders'));
Route::post('admin/orders/manage', array('uses'=>'OrdersController@postManage'));
Route::get('admin/', array('uses'=>'UsersController@getSignin'));
