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

Route::get('/', 'BlogController@index');
Route::get('/blog', 'BlogController@showPost');
Route::get('/contact', 'BlogController@showContact');
Route::get('/blog/{slug}', 'BlogController@showPostDetail');

Route::auth();

Route::group(['middleware' => ['auth']], function () {
	Route::get('dashboard', function() {
		return "Welcome to dashboard";
	});
	Route::group(['middleware' => ['role:admin']], function() {
		Route::resource('users', 'UserController');
	});
	Route::group(['middleware' => ['role:admin,author']], function() {
		Route::resource('categories', 'CategoryController');
		Route::resource('tags', 'TagController');
	});
	Route::resource('posts', 'PostController');
});