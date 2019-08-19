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

/* This died by k
Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


Route::get('/consultas', function(){
    return view('consultas');
})->middleware('auth')->name('consultas');


Route::view('','auth.login')->name('datatable');

Route::get('/datatable','UserController@datatable')->name('datatable');

Route::any('/datatableData','UserController@datatableData')->name('datatables.data');
