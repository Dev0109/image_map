<?php

use Illuminate\Support\Facades\Route;

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
    return view('adminPages.home');
})->name('/');

Route::get('/home', function () {
    return view('adminPages.home');
})->name('/home');

Route::get('login', function () {
    return view('adminPages.login');
})->name('login');

Route::post('/login', 'App\Http\Controllers\AdminController@login')->name('login');
Route::post('logout', 'App\Http\Controllers\Auth\AuthenticatedSessionController@destroy')->name('logout');


Route::get('/AmarAsom', 'App\Http\Controllers\Controller@AmarAsom')->name('AmarAsom');
Route::get('/PurvanchalPrahari', 'App\Http\Controllers\Controller@PurvanchalPrahari')->name('PurvanchalPrahari');
Route::get('/TheMeghalayaGuardian', 'App\Http\Controllers\Controller@TheMeghalayaGuardian')->name('TheMeghalayaGuardian');
Route::get('/TheNorthEastTimes', 'App\Http\Controllers\Controller@TheNorthEastTimes')->name('TheNorthEastTimes');

Route::get('/newsPaper/{id}', 'App\Http\Controllers\PublicViewController@newspaper')->name('newsPaper');



Route::group(['middleware' => ['auth', 'role:administrator']], function () {
    Route::get('/auditTrail', 'App\Http\Controllers\AdminController@auditTrail')->name('auditTrail');

    Route::get('/dashboard', 'App\Http\Controllers\AdminController@dashboard')->name('dashboard');
    Route::get('/updatenewspaper', 'App\Http\Controllers\AdminController@updatenewspaper')->name('updatenewspaper');
    Route::post('/updatenewspaper', 'App\Http\Controllers\AdminController@updatenewspaperpost')->name('updatenewspaper');
    Route::post('/deleteNewPaperImage', 'App\Http\Controllers\AdminController@deleteNewPaperImage')->name('deleteNewPaperImage');
    Route::post('/viewImage', 'App\Http\Controllers\AdminController@viewImage')->name('viewImage');
    Route::get('/viewImage', 'App\Http\Controllers\AdminController@viewImage')->name('viewImage');
    // Route::get('/viewNewsPaper/{id}', 'App\Http\Controllers\AdminController@viewNewsPaper')->name('viewNewsPaper');
    // Route::get('/viewNewsPaper/{paperCode}/{date}/{pageNo}', 'App\Http\Controllers\AdminController@vnp')->name('page');
    Route::get('/viewNewsPaper/{paperCode}/{edition}/{date}/{pageNo}', 'App\Http\Controllers\AdminController@vnp_pedp')->name('viewNewsPaper');
    Route::get('/updateByDate/{date}', 'App\Http\Controllers\AdminController@updateByDate')->name('updateByDate');
    Route::get('/viewByDate/{date}/{paperCode}', 'App\Http\Controllers\AdminController@viewByDate')->name('viewByDate');
    Route::get('/advertisement', 'App\Http\Controllers\AdminController@advertisement')->name('advertisement');
    Route::post('/advertisement', 'App\Http\Controllers\AdminController@advertisementpost')->name('advertisement');
    Route::get('/deleteAdv/{advId}', 'App\Http\Controllers\AdminController@deleteAdv')->name('deleteAdv');
    Route::get('/uploadPDF', 'App\Http\Controllers\AdminController@uploadPDF')->name('uploadPDF');
    Route::post('/uploadPDF', 'App\Http\Controllers\AdminController@uploadPDFpost')->name('uploadPDF');
    Route::post('/deletePDF', 'App\Http\Controllers\AdminController@deletePDF')->name('deletePDF');
    Route::get('/suspendAdv/{advId}', 'App\Http\Controllers\AdminController@suspendAdv')->name('suspendAdv');
    Route::get('/activateAdv/{advId}', 'App\Http\Controllers\AdminController@activateAdv')->name('activateAdv');
    Route::get('/updatePDFByDate/{date}', 'App\Http\Controllers\AdminController@updatePDFByDate')->name('updatePDFByDate');
});
