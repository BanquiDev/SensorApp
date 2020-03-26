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

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/proveedores-form', 'ProveedoresController@create')->name('proveedores-form');

Route::get('/proveedores-registro', 'ProveedoresController@store',  array(
    'as' => 'proovedoresRegistro',
    'uses' => 'ProveedoresController@store'
));

Route::get('/hospitales-listado', 'UserController@index');

Route::get('/proveedores-listado', 'ProveedoresController@index');
Route::get('/hospital/{id}', 'UserController@show');

Route::get('/sensores-form', 'SensoresController@create')->name('sensores-form');
Route::post('/sensores-registro', 'SensoresController@store')->name('sensores-registro');
Route::get('/sensores-listado', 'SensoresController@index')->name('sensores-listado');