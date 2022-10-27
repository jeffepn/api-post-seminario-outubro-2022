<?php

use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->group(function() {
    // Posts
    
    
    // Comments
    Route::apiResource('comments', CommentController::class);
    Route::get('comments/{comment}/post', 'App\Http\Controllers\CommentController@post');
    Route::get('comments/{comment}/user', 'App\Http\Controllers\CommentController@user');
    // Users
    Route::post('users', 'App\Http\Controllers\UserController@store');
    Route::get('users/{user}', 'App\Http\Controllers\UserController@show');
});

// Posts
Route::apiResource('posts', PostController::class);
Route::get('posts/{post}/comments', 'App\Http\Controllers\PostController@comments');

Route::post('login', [AuthController::class, 'login']);

