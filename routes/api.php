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

Route::get('news', 'ApiController@getAllNews');
Route::get('news/{id}', 'ApiController@getNew');
Route::post('news', 'ApiController@createNew');
Route::put('news/{id}', 'ApiController@updateNew');
Route::delete('news/{id}', 'ApiController@deleteNew');
