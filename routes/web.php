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

    Route::get('Albergue/AL', 'AlbergueController@getAL')->name('AL');

    Route::group(['prefix' => '/','middleware' => ['role:Admin|Director|Lider Comunal']], function () {
    Route::get('Mensajeria', 'MensajeriaController@index')->name('inicio_mensaje');
    Route::get('Mensajeria/create', 'MensajeriaController@create')->name('Mensajeria_create');
    Route::post('Mensajeria/store','MensajeriaController@store');
    Route::get('Mensajeria/{Mensajeria}/edit', 'MensajeriaController@edit');
    Route::put('Mensajeria/{Mensajeria}','MensajeriaController@update');
    Route::delete('Mensajeria/{Mensajeria}','MensajeriaController@delete')->name('mensajeria_delete');
    
});
Route::group(['prefix' => '/','middleware' => ['role:Admin|Director|Lider Comunal']], function () {
    Route::get('Retiro_PaquetesV', 'Retiro_PaquetesVController@index')->name('inicio_Retiro_PaquetesV');
    Route::get('Retiro_PaquetesV/create', 'Retiro_PaquetesVController@create')->name('Retiro_PaquetesV_create');
    Route::post('Retiro_PaquetesV/store','Retiro_PaquetesVController@store');
    Route::get('Retiro_PaquetesV/{Retiro_PaquetesV}/edit', 'Retiro_PaquetesVController@edit');
    Route::put('Retiro_PaquetesV/{Retiro_PaquetesV}','Retiro_PaquetesVController@update');
    Route::delete('Retiro_PaquetesV/{Retiro_PaquetesV}','Retiro_PaquetesVController@delete')->name('Retiro_PaquetesV_delete');
    Route::get('Retiro_PaquetesV/pdf', 'Retiro_PaquetesVController@generar')->name('Retiro_PaquetesV_reporte');
    Route::post('Retiro_PaquetesVController/getUsers','Retiro_PaquetesVController@getUsers')->name('Get_UsersR');
    Route::post('Retiro_PaquetesVController/getInventario','Retiro_PaquetesVController@getInventario')->name('Get_Inv');
    Route::post('Retiro_PaquetesVController/ReporteFecha', 'Retiro_PaquetesVController@ReporteFecha')->name('Retiro_reporteF');
});
Route::group(['prefix' => '/'], function () {
    Route::get('Inventario', 'InventarioController@index')->name('inicio_inventario');
    Route::get('Inventario/create', 'InventarioController@create')->name('inventario_create');
    Route::post('Inventario/store','InventarioController@store');
    Route::get('Inventario/{Inventario}/edit', 'InventarioController@edit');
    Route::put('Inventario/{Inventario}','InventarioController@update');
    Route::get('Inventario/{Inventario}/editSuministro', 'InventarioController@editSuministro');
    Route::put('Suministro/{Inventario}','InventarioController@updateSuministro');
    Route::delete('Inventario/{Inventario}','InventarioController@delete')->name('inventario_delete');
    Route::get('Inventario/pdf', 'InventarioController@generar')->name('inventario_reporte');
    Route::post('Inventario/getEmergencia','InventarioController@getEmergencia')->name('Get_Emerge');
    Route::post('Inventario/ReporteFecha', 'InventarioController@ReporteFecha')->name('inventario_reporteF');
});
Route::group(['prefix' => '/'], function () {
    Route::get('EntregaDonaciones', 'EntregaDonacionesController@index')->name('inicio_EntregaDonaciones');
    Route::get('EntregaDonaciones/create', 'EntregaDonacionesController@create')->name('EntregaDonaciones_create');
    Route::post('EntregaDonaciones/store','EntregaDonacionesController@store');
    Route::get('EntregaDonaciones/{EntregaDonaciones}/edit', 'EntregaDonacionesController@edit');
    Route::put('EntregaDonaciones/{EntregaDonaciones}','EntregaDonacionesController@update');
    Route::delete('EntregaDonaciones/{EntregaDonaciones}','EntregaDonacionesController@delete')->name('entregadonaciones_delete'); 
    Route::post('EntregaDonaciones/getJefe','EntregaDonacionesController@getJefe')->name('Get_JefeE');
    Route::post('EntregaDonaciones/getPaquete','EntregaDonacionesController@getPaquete')->name('Get_Paquete');
});
Route::group(['prefix' => '/'], function () {
    Route::get('EntregaDonacionesAlbergue', 'EntregaDonacionesAlbergueController@index')->name('inicio_EntregaDonacionesA');
    Route::get('EntregaDonacionesAlbergue/create', 'EntregaDonacionesAlbergueController@create')->name('EntregaDonacionesA_create');
    Route::post('EntregaDonacionesAlbergue/store','EntregaDonacionesAlbergueController@store');
    Route::get('EntregaDonacionesAlbergue/{EntregaDonacionesAlbergue}/edit', 'EntregaDonacionesAlbergueController@edit');
    Route::put('EntregaDonacionesAlbergue/{EntregaDonacionesAlbergue}','EntregaDonacionesAlbergueController@update');
    Route::delete('EntregaDonacionesAlbergue/{EntregaDonacionesAlbergue}','EntregaDonacionesAlbergueController@delete')->name('EntregadonacionesA_delete'); 
    Route::post('EntregaDonacionesAlbergue/getIdJefeFa','EntregaDonacionesAlbergueController@getIdJefeFa')->name('Get_IdJefeFa');
    Route::post('EntregaDonacionesAlbergue/getAlbergue','EntregaDonacionesAlbergueController@getAlbergue')->name('Get_AlbergueE');
    Route::post('EntregaDonacionesAlbergue/getEmergencia','EntregaDonacionesAlbergueController@getEmergencia')->name('Get_IdEme');
    
});

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::group(['prefix' => '/','middleware' => ['role:Admin|Voluntario']], function () {
    Route::get('Censo', 'CensoController@index')->name('inicio_censo');
    Route::get('Censo/create', 'CensoController@create')->name('censo_create');
    Route::post('Censo/store','CensoController@store');
    Route::get('Censo/{Censo}/edit', 'CensoController@edit');
    Route::put('Censo/{Censo}','CensoController@update');
    Route::delete('Censo/{id}','CensoController@delete')->name('censo_delete');
    Route::post('Censo/getJefe','CensoController@getJefe')->name('Get_JefeC');
});

    Route::group(['prefix' => '/','middleware' => ['role:Admin|Voluntario']], function () {
    Route::get('JefeDeFamilia', 'JefeDeFamiliaController@index')->name('inicio_jefe');
    Route::get('JefeDeFamilia/create', 'JefeDeFamiliaController@create')->name('jefe_create');
    Route::post('JefeDeFamilia/store','JefeDeFamiliaController@store');
    Route::get('JefeDeFamilia/{JefeDeFamilia}/edit', 'JefeDeFamiliaController@edit')->name('jefe_edit');
    Route::put('JefeDeFamilia/{JefeDeFamilia}','JefeDeFamiliaController@update');
    Route::get('JefeDeFamilia/{JefeDeFamilia}/agregarfamiliar', 'JefeDeFamiliaController@agregarfamiliar')->name('familiar');
    Route::put('Familiar/{JefeDeFamilia}','JefeDeFamiliaController@Familiar');
    Route::delete('JefeDeFamilia/{id}','JefeDeFamiliaController@delete')->name('jefe_delete');
});

    Route::group(['prefix' => '/','middleware' => ['role:Admin|Voluntario']], function () {
    Route::get('Familias', 'FamiliasController@index')->name('inicio_familia');
    Route::get('Familias/create', 'FamiliasController@create')->name('familias_create');
    Route::post('Familias/store','FamiliasController@store');
    Route::get('Familias/{Familias}/edit', 'FamiliasController@edit')->name('familias_edit');
    Route::put('Familias/{Familias}','FamiliasController@update');
    Route::delete('Familias/{Familias}','FamiliasController@delete')->name('familias_delete');
    Route::post('Familias/getJefe','FamiliasController@getJefe')->name('Get_JefeF');
});

    Route::group(['prefix' => '/','middleware' => ['role:Admin|Director']], function () {
    Route::get('Emergencia', 'EmergenciaController@index')->name('inicio_emergencia');
    Route::get('Emergencia/create', 'EmergenciaController@create')->name('emergencia_create');
    Route::post('Emergencia/store','EmergenciaController@store');
    Route::get('Emergencia/{Emergencia}/edit', 'EmergenciaController@edit')->name('emergencia_edit');
    Route::put('Emergencia/{Emergencia}','EmergenciaController@update');
    Route::delete('Emergencia/{Emergencia}','EmergenciaController@delete')->name('emergencia_delete');
    
});

Route::group(['prefix' => '/','middleware'=> ['role:Admin|Director|Lider Comunal']], function () {
    Route::get('PersonasAlbergue', 'PersonasAlbergueController@index')->name('inicio_personasAlbergue');
    Route::get('PersonasAlbergue/create', 'PersonasAlbergueController@create')->name('personasAlbergue_create');
    Route::post('PersonasAlbergue/store','PersonasAlbergueController@store');
    Route::get('PersonasAlbergue/{PersonasAlbergue}/edit', 'PersonasAlbergueController@edit')->name('personasAlbergue_edit');
    Route::put('PersonasAlbergue/{PersonasAlbergue}','PersonasAlbergueController@update');
    Route::delete('PersonasAlbergue/{PersonasAlbergue}','PersonasAlbergueController@delete')->name('personasAlbergue_delete');
    Route::post('PersonasAlbergue/getIdJF','PersonasAlbergueController@getIdJF')->name('Get_IdJF');
    Route::post('PersonasAlbergue/getAlbergue','PersonasAlbergueController@getAlbergue')->name('Get_Albergue');
    Route::post('PersonasAlbergue/getEmergencia','PersonasAlbergueController@getEmergencia')->name('Get_EmergenciaP');
});
    Route::group(['prefix' => '/','middleware' => ['role:Admin|Director|Lider Comunal']], function () {
    Route::get('Albergue', 'AlbergueController@index')->name('inicio_albergue');
    Route::get('Albergue/create', 'AlbergueController@create')->name('albergue_create');
    Route::post('Albergue/store','AlbergueController@store');
    Route::get('Albergue/{Albergue}/edit', 'AlbergueController@edit')->name('albergue_edit');
    Route::put('Albergue/{Albergue}','AlbergueController@update');
    Route::delete('Albergue/{Albergue}','AlbergueController@delete')->name('albergue_delete');
    Route::post('Albergue/getUsers','AlbergueController@getUsers')->name('Get_UsersA');
    Route::post('Albergue/getEmergencia','AlbergueController@getEmergeA')->name('Get_EmergeA');
});
    Route::group(['prefix' => '/'], function () {
    Route::put('user/{user}','user@update')->name('user_edit');
    Route::get('user/{user}','user@show')->name('user_show');
});
Route::group(['prefix' => '/','middleware' => ['role:Admin']], function () {
    Route::get('user', 'user@index')->name('inicio_usuario');
    Route::get('roles/create', 'roles@create')->name('crearRol');
    Route::post('roles/store','roles@store');
    Route::delete('user/{user}','user@destroy')->name('user_delete');
    Route::delete('roles/{roles}','roles@destroy')->name('rol_delete');
    Route::get('Permissions/create', 'PermissionsController@create')->name('crear_permiso');
    Route::delete('Permissions/{Permissions}','PermissionsController@destroy')->name('permissions_delete');
    Route::post('Permissions/store','PermissionsController@store');
    Route::get('PermisoRol/create', 'PermisoRolController@create')->name('crear_permisoRol');
    Route::delete('PermisoRol/{PermisoRol}','PermisoRolController@destroy')->name('permisoRol_delete');
    Route::post('PermisoRol/store','PermisoRolController@store');
    Route::get('UserRol/create', 'UserRolController@create')->name('crear_UserRol');
    Route::delete('UseroRol/{UserRol}','UserRolController@destroy')->name('UserRol_delete');
    Route::post('UserRol/store','UserRolController@store');
    Route::post('UserRol/getUsers','UserRolController@getUsers')->name('Get_Users');
    Route::post('UserRol/getRoles','UserRolController@getRoles')->name('Get_Roles');
});
    Route::group(['prefix' => '/'], function () {
    Route::get('/', 'NoticiaController@index1'); 
    Route::get('Noticia', 'NoticiaController@index')->name('inicio_noticia');
    Route::get('Noticia/create', 'NoticiaController@create')->name('noticia_create');
    Route::post('Noticia/store','NoticiaController@store');
    Route::get('Noticia/{Noticia}/edit', 'NoticiaController@edit');
    Route::put('Noticia/{Noticia}','NoticiaController@update');
    Route::delete('Noticia/{Noticia}','NoticiaController@delete')->name('noticia_delete');
    
});
    Route::post('VoluntarioWeb/store','VoluntarioWebController@store');
    Route::group(['prefix' => '/'], function () {
    Route::get('VoluntarioWeb', 'VoluntarioWebController@index')->name('inicio_voluntarioweb');
   //Route::get('/', 'VoluntarioWebController@create')->name('VoluntarioWeb_create');
    
    Route::get('VoluntarioWeb/{VoluntarioWeb}/edit', 'VoluntarioWebController@edit');
    Route::put('VoluntarioWeb/{VoluntarioWeb}','VoluntarioWebController@update');
    Route::delete('VoluntarioWeb/{VoluntarioWeb}','VoluntarioWebController@delete')->name('voluntarioweb_delete');

}); 
