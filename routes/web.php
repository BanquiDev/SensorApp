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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
//home
Route::get('/home', 'HomeController@index')->name('home');
//hospitales
Route::get('/hospitales-listado', 'UserController@index');
Route::get('/hospital/{id}', 'UserController@show');
//sensores
Route::get('/sensores-form', 'SensoresController@create')->name('sensores-form');
Route::post('/sensores-registro', 'SensoresController@store')->name('sensores-registro');
Route::get('/sensores-listado', 'SensoresController@index')->name('sensores-listado');
Route::get('/sensor/{id}', 'SensoresController@show')->name('sensor');
Route::get('/sensores-editar-form/{id}', 'SensoresController@edit')->name('sensores-editar-form');
Route::post('/sensores-update/{id}', 'SensoresController@update')->name('sensores-update');
Route::get('/sensores-baja/{id}', 'SensoresController@destroy')->name('sensores-baja');
//proveedores
Route::get('/proveedor/{id}', 'ProveedoresController@show')->name('proveedor');
Route::get('/proveedores-listado', 'ProveedoresController@index')->name('proveedores-listado')->middleware('auth');
Route::post('/proveedores-registro', 'ProveedoresController@store',  array(
    'as' => 'proovedoresRegistro',
    'uses' => 'ProveedoresController@store'
));
Route::get('/proveedores-form', 'ProveedoresController@create')->name('proveedores-form');
Route::get('/proveedores-baja/{id}', 'ProveedoresController@destroy')->name('proveedores-baja');
Route::get('/proveedores-editar-form/{id}', 'ProveedoresController@edit')->name('proveedores-editar-form');
Route::post('/proveedores-update/{id}', 'ProveedoresController@update');
//Route::get('/proveedores-login', 'ProveedoresController@login');
//Route::post('/proveedores-checked', 'ProveedoresController@checked');
Route::get('/proveedores-login', 'ProveedoresController@login')->name('proveedor-login-form');
Route::post('/proveedores-checked', 'ProveedoresController@checked');
Route::get('/proveedores-panel', 'ProveedoresController@proveedoresHome')->name('proveedores-home');
// Tareas
Route::resource('/tareas', 'TareaController');
Route::get('/tareas-create/{id}', 'TareaController@create');
Route::post('/tareas-store/{id}', 'TareaController@store');