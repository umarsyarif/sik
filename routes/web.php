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

Auth::routes();

Route::get('/', 'PageController@welcome');

Route::resource('article', 'ArticleController', ['except' => ['edit', 'create']]);
Route::post('/article/result', 'ArticleController@result')->name('article.result');
Route::post('/article/category', 'ArticleController@fetch')->name('article.fetch');

Route::resource('user', 'UserController', ['except' => ['show']]);
Route::resource('category', 'CategoryController', ['except' => ['show', 'edit', 'create']]);

Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});
