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

// Auth user
Route::get('auth/login', ['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Auth admin
//Route::get('admin/login', ['as' => 'admin/login', 'uses' => 'Admin\AuthController@getAdminLogin']);
//Route::post('admin/login', 'Admin\AuthController@postAdminLogin');

Route::resource('post', 'PostController', ['only' => ['create', 'store']]);
Route::resource('user', 'UserController', ['only' => ['show']]);
Route::resource('admin', 'AdminController');
Route::get('about', 'PagesController@getAbout');
Route::get('/', 'PagesController@getIndex');
	
