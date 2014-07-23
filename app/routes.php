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

//uses string triggers controllername/method name
Route::get('/', array('uses'=>'StoreController@getIndex'));


//our uri is going to read admin/categories/{controller method name} so we specify it
//in our route for Categories controller
Route::controller('admin/categories', 'CategoriesController');

Route::controller('admin/products', 'ProductsController');

Route::controller('store', 'StoreController');

Route::controller('users', 'UsersController');
