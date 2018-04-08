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

Route::get('/','MyControll@login')->name('welcome')->name('login');
Route::post('/signin','MyControll@signin');
Route::get('hak','MyControll@hak')->name('hak');
Route::get('/logout','MyControll@logout');
Route::group(['middleware' => 'auth','admin'], function () {
	Route::get('/home','MyControll@home')->name('home');
	Route::get('/akun','MyControll@akun')->name('akun');
	Route::post('/tambahakun','MyControll@tambahakun');
	Route::post('/hapusakun','MyControll@hapusakun');
	Route::post('/ubahakun','MyControll@ubahakun');
	Route::get('/get/{id}','MyControll@getajax')->name('test');
	Route::get('/detail/{id}','MyControll@detail')->name('detail');
	Route::post('/isidetail','MyControll@isidetail');
	Route::get('dokter','MyControll@dokter');
	Route::get('/dokterdetail/{id}','MyControll@dokterdetail')->name('dokterdetail');
	Route::post('hapusdok','MyControll@hapusdok');
	Route::post('aktifdok','MyControll@aktifdok');
	Route::post('nondok','MyControll@nondok');
	Route::post('tambahdok','MyControll@tambahdok');
	Route::get('/pendidikandok/{id}','MyControll@pendidikandok')->name('pendidikandok');
	Route::get('/getdok/{id}','MyControll@getdok');
	Route::post('/editdok','MyControll@editdok');
	Route::get('pasien','MyControll@pasien');
	Route::get('/detailpasien/{id}','MyControll@detailpasien');
});
Route::group(['middleware' => 'dokter'], function () {
	Route::get('/rumah','MyControll@rumah')->name('rumah');
});
Route::get('/generate',function(){
	return bcrypt('1');
});
