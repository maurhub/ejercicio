<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Proveedores Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'ProveedorController@index')->name('proveedores');
Route::get('/proveedor/create', 'ProveedorController@create')->name('createProveedor');
Route::get('/proveedor/edit/{id}', 'ProveedorController@edit')->name('editProveedor');

Route::post('/proveedor/store', 'ProveedorController@store')->name('storeProveedor');

Route::put('/proveedor/update/{id}', 'ProveedorController@update')->name('updateProveedor');

Route::delete('/proveedor/delete/{id}', 'ProveedorController@destroy')->name('destroyProveedor');

/*
|--------------------------------------------------------------------------
| Remitos Routes
|--------------------------------------------------------------------------
*/

Route::get('/remitos/{proveedor_id}', 'RemitoController@show')->name('remitos');
Route::get('/remitos', 'RemitoController@create')->name('createRemito');
Route::get('/remitos/edit/{id}', 'RemitoController@edit')->name('editRemito');

Route::post('/remitos/store', 'RemitoController@store')->name('storeRemito');

Route::put('/remitos/update/{id}', 'RemitoController@update')->name('updateRemito');

Route::delete('/remitos/delete/{id}', 'RemitoController@destroy')->name('destroyRemito');
