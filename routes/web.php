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

/* Route::get('/companias', 'CompaniasController@index')->name('companias');
Route::get('/companias/create', 'CompaniasController@create')->name('create'); */

Route::resource('companias', 'CompaniasController');
Route::resource('empleados', 'EmpleadosController');
