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

use App\Http\Controllers\permisoController;
use Doctrine\DBAL\Schema\Index;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'permiso'], function () {
    Route::get('/', 'permisoController@Index');
    Route::post('/','permisoController@store');
    Route::put('/{permiso}','permisoController@update');
});
