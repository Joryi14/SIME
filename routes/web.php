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


Route::group(['prefix' => '/'], function () {
    //Route::get('/', 'HomeController@Index');
    Route::get('/','Homecontroller@Login');
});
Route::group(['prefix' => 'admin','namespace' => 'Admin'], function () {
    Route::get('permiso', 'permisoController@index');
    Route::post('permiso/store','permisoController@store');
    Route::put('/{permiso}','permisoController@update');
});


Route::group(['prefix' => '/'], function () {
    Route::get('Censo', 'CensoController@index');
    Route::get('Censo/create', 'CensoController@create');
    Route::post('Censo/store','CensoController@store');
    Route::put('/{Censo}','CensoController@update');
});

Route::group(['prefix' => '/'], function () {
    Route::get('JefeDeFamilia', 'JefeDeFamiliaController@index');
    Route::post('JefeDeFamilia/store','JefeDeFamiliaController@store');
    Route::put('/{JefeDeFamilia}','JefeDeFamiliaController@update');
});
