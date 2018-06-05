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
  return redirect('home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('kelas', 'KelasController');

Route::resource('soals', 'SoalController');

Route::resource('jawabans', 'JawabanController');

Route::resource('siswas', 'SiswaController');

Route::resource('skors', 'SkorController');

Route::resource('pertanyaans', 'PertanyaanController');

Route::resource('admins', 'AdminController');