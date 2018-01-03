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

Route::get('/index', function () {
	return view('index');
});

Route::get('/db', 'DBController@index');

Route::get('/table/list', 'TableListController@index');

Route::get('/table/detail', 'TableDetailController@index');

Route::get('/docs', 'DocsController@index');
