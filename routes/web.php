<?php
use App\Models\Role;
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

Route::get('/','MyControll@login')->name('welcome');
Route::post('/signin','MyControll@signin');
Route::get('hak','MyControll@hak')->name('hak');
Route::get('/logout','MyControll@logout');
Route::group(['middleware' => 'admin'], function () {
	Route::get('/home','MyControll@home')->name('home');
	Route::get('/akun','MyControll@akun')->name('akun');
	Route::post('/tambahakun','MyControll@tambahakun');
	Route::post('/hapusakun','MyControll@hapusakun');
	Route::post('/ubahakun','MyControll@ubahakun');
	Route::get('/get/{id}','MyControll@getajax');
});
Route::group(['middleware' => 'dokter'], function () {
	Route::get('/rumah','MyControll@rumah')->name('rumah');
});
Route::get('/generate',function(){
	return bcrypt('12345678');
});
