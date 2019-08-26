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


//Route::group(['prefix' => 'Censo'], function(){
//Route:: get('/', 'CensoController@index');
//Route:: post('/', 'CensoController@store');
//Route:: get('/', 'CensoController@create');
//});
Route::resource('Censo', 'CensoController');
Route::resource('JefeDeFamilia', 'JefeDeFamiliaController');