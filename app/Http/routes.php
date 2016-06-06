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

/*
 * Public routes
 */

Route::get('/', 'BlogController@index');
Route::get('/blog/search', ['uses' => 'BlogController@search', 'as' => 'blog.search']);
Route::get('/blog', 'BlogController@showPost');
Route::get('/blog/search/{type}/{keyword}', 'BlogController@searchBy');
Route::get('/blog/{slug}', 'BlogController@showPostDetail');
Route::get('/about', 'BlogController@showAbout');
Route::get('/contact', 'BlogController@showContact');
Route::post('/contact', 'BlogController@sendEmail');

/*
 * Auth routes
 */

Route::auth();

Route::group(['middleware' => ['auth']], function () {
	Route::get('dashboard', function() {
		$posts = auth()->user()->hasRole('admin') ? App\Post::take(5)->get() : App\Post::where('author_id', auth()->user()->id)->take(5)->get();
		$users = App\User::paginate(10);

		return view('admin.dashboard.index', compact('posts', 'users'));
	});
	Route::resource('posts', 'PostController');
	
	Route::get('user/setting', 'UserController@setting');
	Route::put('user/setting', ['as' => 'user.setting', 'uses' => 'UserController@settingUpdate']);

	Route::group(['middleware' => ['role:admin']], function() {
		Route::resource('users', 'UserController');
	});
	Route::group(['middleware' => ['role:admin,author']], function() {
		Route::resource('categories', 'CategoryController');
		Route::resource('tags', 'TagController');
	});
});