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
    Route::get('Menu', 'MenuController@index');
    Route::get('Menu/Create','MenuController@Create')->name('menu_create');
    Route::post('Menu','MenuController@Store')->name('menu_guardar');
    Route::get('Menu/{id}/editar', 'MenuController@edit')->name('menu_edit');
    Route::put('Menu/{id}', 'MenuController@update')->name('menu_update');
    Route::get('Menu/{id}/destroy', 'MenuController@destroy')->name('menu_delete');
    Route::post('Menu/guardar-orden', 'MenuController@guardarOrden')->name('guardar_orden');
    Route::get('rol', 'rolController@index')->name('rol_index');
    Route::get('rol/Create','rolController@Create')->name('rol_create');
    Route::post('rol','rolController@Store')->name('rol_guardar');
    Route::get('rol/{id}/edit', 'rolController@edit')->name('rol_edit');
    Route::put('rol/{id}', 'rolController@update')->name('rol_update');
    Route::delete('rol/{id}', 'rolController@delete')->name('rol_delete');
});


Route::group(['prefix' => '/'], function () {
    Route::get('Censo', 'CensoController@index');
    Route::get('Censo/create', 'CensoController@create')->name('censo_create');
    Route::post('Censo/store','CensoController@store');
    Route::get('Censo/{Censo}/edit', 'CensoController@edit');
    Route::put('Censo/{Censo}','CensoController@update');
    Route::delete('Censo/{Censo}','CensoController@delete')->name('censo_delete');
});

Route::group(['prefix' => '/'], function () {
    Route::get('JefeDeFamilia', 'JefeDeFamiliaController@index');
    Route::get('JefeDeFamilia/create', 'JefeDeFamiliaController@create')->name('jefe_create');
    Route::post('JefeDeFamilia/store','JefeDeFamiliaController@store');
    Route::get('JefeDeFamilia/{JefeDeFamilia}/edit', 'JefeDeFamiliaController@edit')->name('jefe_edit');
    Route::put('JefeDeFamilia/{JefeDeFamilia}','JefeDeFamiliaController@update');
    Route::delete('JefeDeFamilia/{JefeDeFamilia}','JefeDeFamiliaController@delete')->name('jefe_delete');
});

Route::group(['prefix' => '/'], function () {
    Route::get('Familias', 'FamiliasController@index');
    Route::get('Familias/create', 'FamiliasController@create')->name('familias_create');
    Route::post('Familias/store','FamiliasController@store');
    Route::get('Familias/{Familias}/edit', 'FamiliasController@edit')->name('familias_edit');
    Route::put('Familias/{Familias}','FamiliasController@update');
    Route::delete('Familias/{Familias}','FamiliasController@delete')->name('familias_delete');
});

Route::group(['prefix' => '/'], function () {
    Route::get('Emergencia', 'EmergenciaController@index');
    Route::get('Emergencia/create', 'EmergenciaController@create')->name('emergencia_create');
    Route::post('Emergencia/store','EmergenciaController@store');
    Route::get('Emergencia/{Emergencia}/edit', 'EmergenciaController@edit')->name('emergencia_edit');
    Route::put('Emergencia/{Emergencia}','EmergenciaController@update');
    Route::delete('Emergencia/{Emergencia}','EmergenciaController@delete')->name('emergencia_delete');
});

Route::group(['prefix' => '/'], function () {
    Route::get('PersonaAlbergue', 'PersonasAlbergue@index');
    Route::get('PersonaAlbergue/create', 'PersonasAlbergue@create')->name('personaAlbergue_create');
    Route::post('PersonaAlbergue/store','PersonasAlbergue@store');
    Route::get('PersonaAlbergue/{PersonaAlbergue}/edit', 'PersonasAlbergue@edit')->name('personaAlbergue_edit');
    Route::put('PersonaAlbergue/{PersonaAlbergue}','PersonasAlbergue@update');
    Route::delete('PersonaAlbergue/{PersonaAlbergue}','PersonasAlbergue@delete')->name('personaAlbergue_delete');
});