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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/jenis', 'JenisController@index')->name('jenis');
Route::get('/jenis/create', 'JenisController@create')->name('jenis.create');
Route::post('/jenis/create', 'JenisController@store');
Route::get('/jenis/{id}/edit', 'JenisController@edit')->name('jenis.edit');
Route::post('/jenis/{id}/edit', 'JenisController@update');
Route::get('/jenis/{id}/del', 'JenisController@destroy')->name('jenis.del');

Route::get('/parkir', 'ParkirController@index')->name('parkir');
Route::get('/parkir/create', 'ParkirController@create')->name('parkir.create');
Route::post('/parkir/create', 'ParkirController@store');
Route::get('/parkir/{id}/edit', 'ParkirController@edit')->name('parkir.edit');
Route::post('/parkir/{id}/edit', 'ParkirController@update');
Route::get('/parkir/{id}/del', 'ParkirController@destroy')->name('parkir.del');

Route::get('/keluar', 'KeluarController@index')->name('keluar');
Route::get('/keluar/{plat}', 'KeluarController@keluar')->name('parkir.keluar');
Route::post('/keluar/{plat}', 'KeluarController@store');
Route::get('/keluar/{id}/del', 'KeluarController@destroy')->name('keluar.del');
