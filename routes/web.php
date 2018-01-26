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

Route::get('/admin/products','ProductController@index');//listado
Route::get('/admin/products/create','ProductController@create');//crear , devolvera un formulario

Route::post('/admin/products','ProductController@store');//store, se encarga de guardar los datos ingresados en el formularo 

