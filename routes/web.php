<?php

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

Route::get('/', function () {
	return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/permission-denied', 'Admin\\AdminController@permissionDenied')->name('permission-denied');

Route::group(['prefix' => 'admin'], function() {
	Auth::routes();
	Route::get('/logout', 'Auth\LoginController@logout');
});

Route::group(['prefix' => 'admin', 'middleware' => 'permission'], function() {
	Route::get('/', 'Admin\AdminController@index');

	Route::post('roles/batch-remove', 'Admin\\RolesController@batchRemove');
	Route::resource('roles', 'Admin\RolesController');

	Route::post('permissions/batch-remove', 'Admin\\PermissionsController@batchRemove');
	Route::resource('permissions', 'Admin\PermissionsController');

	Route::post('users/batch-remove', 'Admin\\UsersController@batchRemove');
	Route::resource('users', 'Admin\UsersController');

	Route::post('posts/batch-remove', 'Admin\\PostsController@batchRemove');
	Route::resource('posts', 'Admin\\PostsController');

	Route::post('bookmark/batch-remove', 'Admin\\BookmarkController@batchRemove');
	Route::resource('bookmark', 'Admin\BookmarkController');

	Route::post('frame/batch-remove', 'Admin\\FrameController@batchRemove');
	Route::resource('frame', 'Admin\FrameController');

	Route::post('clock/batch-remove', 'Admin\\ClockContrller@batchRemove');
	Route::resource('clock', 'Admin\ClockContrller');

	Route::post('pillow/batch-remove', 'Admin\\PillowController@batchRemove');
	Route::resource('pillow', 'Admin\PillowController');

	Route::post('neck/batch-remove', 'Admin\\NeckController@batchRemove');
	Route::resource('neck', 'Admin\NeckController');

});
