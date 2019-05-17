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
/* Setup CORS */
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('buku', 'BukuController@index')->middleware('auth:api');

//List single Buku
Route::get('buku/{id}', 'BukuController@show')->middleware('auth:api');

//Create new Buku
Route::post('buku', 'BukuController@store')->middleware('auth:api');

//Update Buku
Route::put('buku', 'BukuController@store')->middleware('auth:api');

//Delete Buku
Route::delete('buku/{id}', 'BukuController@destroy')->middleware('auth:api');

Route::get('dataBuku','BukuController@getData');