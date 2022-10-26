<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

/*
Route::post('posts', 'App\Http\Controllers\PostController@store');
Route::get('posts/{post}', 'App\Http\Controllers\PostController@show');
Route::get('posts', 'App\Http\Controllers\PostController@index');
Route::patch('posts/{post}', 'App\Http\Controllers\PostController@update');
Route::delete('posts/{post}', 'App\Http\Controllers\PostController@destroy');
*/

Route::apiResource('posts', PostController::class);
/*
Route::post('comments', 'App\Http\Controllers\CommentController@store');
Route::get('comments/{comment}', 'App\Http\Controllers\CommentController@show');
Route::get('comments', 'App\Http\Controllers\CommentController@index');
Route::patch('comments/{comment}', 'App\Http\Controllers\CommentController@update');
Route::delete('comments/{comment}', 'App\Http\Controllers\CommentController@destroy');
*/
Route::apiResource('comments', CommentController::class);
