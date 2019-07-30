<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user', 'UserController@index');
Route::get('user/{id}', 'UserController@fetchUser');
Route::put('user/{id}', 'UserController@updateUser');

Route::get('article', 'ArticleController@index');
Route::get('article/{id}', 'ArticleController@fetchArticle');
Route::put('article/{id}', 'ArticleController@updateArticle');

Route::get('post', 'PostController@index');
Route::get('post/{id}', 'PostController@fetchPost');
Route::put('post/{id}', 'PostController@updatePost');

