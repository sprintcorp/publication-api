<?php

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
Route::group(['namespace' => 'Api'], function(){
Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('/login', 'Auth\AuthController@login');
    Route::post('/register', 'Auth\AuthController@register');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('/logout', 'Auth\AuthController@logout');
        Route::post('/refresh', 'Auth\AuthController@refresh');
        Route::get('/user-profile', 'Auth\AuthController@userProfile');
    });
});

Route::group(['prefix' => 'admin'], function(){
    Route::resource('publisher','Admin\PublisherController');
    Route::resource('author','Admin\AuthorController');

});
});
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
