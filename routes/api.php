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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/getConnections', 'App\Http\Controllers\AdminController@getConnections')->name('getConnections');
Route::post('/saveMappedArea', 'App\Http\Controllers\AdminController@saveMappedArea')->name('saveMappedArea');
Route::post('/getEditions', 'App\Http\Controllers\AdminController@getEditions')->name('getEditions');
