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
Route::resource('/','ClientesController')->middleware('auth');;
Route::resource('/home','ClientesController')->middleware('auth');;
Route::get('/logout', 'Auth\LoginController@logout')->name('logout' );
Route::get('/tiendas/perfil', 'UsersController@perfil')->name('tiendas.perfil' );


Auth::routes();

Route::resource('cliente','ClientesController')->middleware('auth')->name('cliente.index' );
Route::get('/cliente/create', 'ClientesController@create')->name('cliente.create' );
Route::post('/cliente/store', 'ClientesController@store')->name('cliente.store');
Route::get('/cliente/activar/{id}', 'ClientesController@activar')->name('cliente.activar');

Route::post('/cliente/save/{id}', 'ClientesController@update')->name('cliente.edit');

Route::resource('tiendas','UsersController')->middleware('auth');;
Route::get('/tiendas/create', 'UsersController@create')->name('tiendas.create' );
Route::post('/tiendas/store', 'UsersController@store')->name('tiendas.store');
Route::post('/tiendas/save', 'UsersController@update')->name('tiendas.edit');
Route::get('/tiendas/activar/{id}', 'UsersController@activar')->name('tiendas.activar');
