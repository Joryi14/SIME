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
    /*Permiso*/ 
    Route::get('permiso', 'permisoController@index');
    Route::post('permiso/store','permisoController@store');
    Route::put('/{permiso}','permisoController@update');
    /* Menu*/ 
    Route::get('Menu', 'MenuController@index');
    Route::get('Menu/Create','MenuController@Create')->name('menu_create');
    Route::post('Menu','MenuController@Store')->name('menu_guardar');
    Route::get('Menu/{id}/editar', 'MenuController@edit')->name('menu_edit');
    Route::put('Menu/{id}', 'MenuController@update')->name('menu_update');
    Route::get('Menu/{id}/destroy', 'MenuController@destroy')->name('menu_delete');
    Route::post('Menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden');
    /*Rol*/ 
    Route::get('rol', 'rolController@index')->name('rol_index');
    Route::get('rol/Create','rolController@Create')->name('rol_create');
    Route::post('rol','rolController@Store')->name('rol_guardar');
    Route::get('rol/{id}/edit', 'rolController@edit')->name('rol_edit');
    Route::put('rol/{id}', 'rolController@update')->name('rol_update');
    Route::delete('rol/{id}', 'rolController@delete')->name('rol_delete');
    /*MenuRol*/
    Route::get('menurol', 'MenurolController@index')->name('menurol_index');
    Route::post('menurol','rolController@Store')->name('menurol_guardar');
});

