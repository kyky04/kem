<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('kelas', 'KelasAPIController');

Route::resource('soals', 'SoalAPIController');
Route::get('soals-kelas', 'SoalAPIController@indexByKelas');

Route::resource('jawabans', 'JawabanAPIController');
Route::post('jawaban-soal', 'JawabanAPIController@indexBySoal');

Route::resource('siswas', 'SiswaAPIController');
Route::get('siswas-kelas', 'SiswaAPIController@indexByKelas');

Route::resource('skors', 'SkorAPIController');

Route::resource('pertanyaans', 'PertanyaanAPIController');
Route::post('pertanyaan-soal', 'PertanyaanAPIController@pertanyaanBySoal');

Route::post('login', 'LoginController@login');
Route::post('login-admin', 'LoginController@loginAdmin');

Route::get('skors-siswa', 'SkorAPIController@skorSiswa');
Route::get('skors-saya', 'SkorAPIController@skorSaya');

Route::resource('admins', 'AdminAPIController');