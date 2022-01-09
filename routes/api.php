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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['namespace' => 'Api','prefix'=> 'v1' ],function ()
{

    Route::post('register','AuthController@register');
    Route::post('login','AuthController@login');
    Route::post('send-pin-code', 'AuthController@clientSendPinCode');
    Route::post('check-pin-code','AuthController@checkCode');

    Route::post('new-password','AuthController@newPassword');
    Route::post('reset-password','AuthController@resetpassword') ;
    // Route::get('home-out-auth','MainController@index');

    Route::group(['middleware' => 'auth:api'],function () {
        Route::post('change-password', 'AuthController@changePassword');
        Route::post('logout', 'AuthController@logOut');

        Route::get('home','MainController@index');
        Route::post('addvedio','MainController@addvedio');
        Route::get('getcomments','MainController@getcomments');
        Route::post('comments','MainController@comments');
        Route::get('getclientdata','MainController@getclientdata');
        Route::post('profileedit','MainController@profileedit');
        Route::post('search','MainController@search');
    });


    });

