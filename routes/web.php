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

Route::get('/', 'TestController@welcome');

/*Route::get('/prueba', function () {
    return 'hoolaa w:D elcome';
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show');//formulario edicion

Route::post('/cart','CartDetailController@store');//formulario edicion
Route::delete('/cart','CartDetailController@destroy');//formulario edicion

Route::post('/order','CartController@update');//formulario edicion




Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::get('/products','ProductController@index');//listado
	Route::get('/products/create','ProductController@create');//crear , devolvera un formulario

	Route::post('/products','ProductController@store');//store, se encarga de guardar los datos ingresados en el formularo 

	//edicion
	Route::get('/products/{id}/edit','ProductController@edit');//formulario edicion

	Route::post('/products/{id}/edit','ProductController@update');//actualizar

	Route::delete('/products/{id}','ProductController@destroy');//formulario eliminar


	Route::get('/products/{id}/images','ImageController@index');//listado
	Route::post('/products/{id}/images','ImageController@store');//registrar
	Route::delete('/products/{id}/images','ImageController@destroy');//formulario eliminar
	
	Route::get('/products/{id}/images/select/{image}','ImageController@select');//destacar



});





