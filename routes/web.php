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

Route::get('admin/dang-nhap', ['as' => 'getLogin', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('admin/dang-nhap', ['as' => 'postLogin', 'uses' => 'Auth\LoginController@postLogin']);

Route::get('admin/dang-ky', ['as' => 'getRegister', 'uses' => 'Auth\LoginController@getRegister']);
Route::post('admin/dang-ky', ['as' => 'postRegister', 'uses' => 'Auth\LoginController@postRegister']);

Route::get('master', ['as' => 'getMaster', 'uses' => 'Auth\LoginController@getMaster']);

Route::get('logout', ['as' => 'getLogout', 'uses' => 'Auth\LoginController@getLogout']);
Route::get('index', ['as' => 'getIndex', 'uses' => 'Auth\LoginController@getIndex']);

Route::get('master', ['as' => 'getMaster', 'uses' => 'Auth\LoginController@getMaster']);