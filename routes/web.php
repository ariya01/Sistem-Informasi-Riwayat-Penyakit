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
Route::group(['middleware' => 'admin'], function () {
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
	Route::get('rumahsakit','MyControll@rumahsakit')->name("rumahsakit");
	Route::get('/obat','MyControll@obat')->name('obat');
	Route::get('penyakit','MyControll@penyakit')->name('penyakit');
	Route::get('penyakitnya/{id}','MyControll@riwayatpenyakit');
	Route::get('detailnya/{id}','MyControll@detailnya');
	Route::get('alergi/{id}','MyControll@alergi');
	Route::get('keluarga/{id}','MyControll@keluarga');
	Route::post('tambahrs','MyControll@tambahrs');
	Route::post('hapusrs','MyControll@hapusrs');
	Route::post('editrs','MyControll@editrs');
	ROute::post('tambahobt','MyControll@tambahobt');
	Route::post('hapusobt','MyControll@hapusobt');
	Route::post('editobt','MyControll@editobt');
	Route::post('tambahpenyakit','MyControll@tambahpenyakit');
	Route::post('editpenyakit','MyControll@editpenyakit');
	Route::post('hapuspenyakit',"MyControll@hapuspenyakit");
	Route::get('dokternya/{id}','MyControll@dokternya');
	Route::get('pendidikan/{id}','MyControll@pendidikan');
	Route::get('editakun/{id}','MyControll@editakun');
	Route::get('ajax1/{id}','MyControll@ajax1');
	Route::get('deleteakun/{id}','MyControll@deleteakun');
	Route::post('editnya','MyControll@editnya');
	Route::get('editpenyakitnya/{id}','MyControll@editpenyakitnya');
	Route::get('ajax2/{id}','MyControll@ajax2');
	Route::post('editpenyakitku','MyControll@editpenyakitku');
	Route::get('deletepenyakit/{id}','MyControll@deletepenyakit');
});
Route::group(['middleware' => 'dokter'], function () {
	Route::get('/rumah','MyControll@rumah')->name('rumah');
	Route::get('/pasiendokter','MyControll@pasiendokter')->name('pasiendokter');
});
Route::group(['middleware' => 'pasien'],function(){
	Route::get('identitas','MyControll@identitas')->name('griya');
});
Route::get('/generate',function(){
	return bcrypt('1');
});
