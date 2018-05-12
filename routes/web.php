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
	Route::get('rumahsakit','MyControll@rumahsakit')->name("rumahsakit");
	Route::get('/obat','MyControll@obat')->name('obat');
	Route::get('penyakit','MyControll@penyakit')->name('penyakit');
	Route::get('penyakitnya/{id}','MyControll@riwayatpenyakit')->name('penyakitnya');
	Route::get('detailnya/{id}','MyControll@detailnya')->name('detailnya');
	Route::get('alergi/{id}','MyControll@alergi')->name('alergi');
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
	Route::get('dokternya/{id}','MyControll@dokternya')->name('dokternya');
	Route::get('pendidikan/{id}','MyControll@pendidikan');
	Route::get('editakun/{id}','MyControll@editakun');
	Route::get('ajax1/{id}','MyControll@ajax1');
	Route::get('deleteakun/{id}','MyControll@deleteakun');
	Route::post('editnya','MyControll@editnya');
	Route::get('editpenyakitnya/{id}','MyControll@editpenyakitnya');
	Route::get('ajax2/{id}','MyControll@ajax2');
	Route::post('editpenyakitku','MyControll@editpenyakitku');
	Route::get('deletepenyakit/{id}','MyControll@deletepenyakit');
	Route::get('care/{id}','MyControll@care');
	Route::get('editpendidikan/{id}','MyControll@editpendidikan');
	Route::get('detail1/{id}','MyControll@detail1');
	Route::post('/isidetail1','MyControll@isidetail1');
	Route::get('/editobat/{id}','MyControll@editobat');
	Route::get('ajax3/{id}','MyControll@ajax3');
	Route::post('editobatnya','MyControll@editobatnya');
	Route::get('deleteobat/{id}','MyControll@deleteobat');
	Route::get('editrumah/{id}','MyControll@editrumah');
	Route::get('ajax4/{id}','MyControll@ajax4');
	Route::get('deleterumah/{id}','MyControll@deleterumah');
	Route::post('rumahsakitnya','MyControll@rumahsakitnya');
	Route::get('pemeriksaan/{id}','MyControll@pemeriksaan');
	Route::get('editpenyakitnya1/{id_riwayat}/{id_user}','MyControll@editpenyakitnya1');
	Route::post('kirim','MyControll@kirim');
	Route::get('ajax5/{id}','MyControll@ajax5');
	Route::get("/editalerginya/{id_alergi}/{id_user}",'MyControll@editalerginya');
	Route::get('hapusri/{id_penyakit}/{id_user}','MyControll@hapusri');
	Route::get('ajax6/{id}','MyControll@ajax6');
	Route::get('hapusri1/{id_alergi}/{id_user}','MyControll@hapusri1');
	Route::post('kirim1','MyControll@kirim1');
	Route::get('ajax7/{id}','MyControll@ajax7');
	Route::get('alergiku','MyControll@alergiku')->name('ubah');
	Route::get('ubah/{id}','MyControll@ubah');
	Route::get('ajax8/{id}','MyControll@ajax8');
	Route::post('kirim3','MyControll@kirim3');
	Route::get('deletehehe/{id}','MyControll@deletehehe');
});
Route::group(['middleware' =>'auth', 'dokter'], function () {
	Route::get('/rumah','MyControll@rumah')->name('rumah');
	Route::get('/pasiendokter','MyControll@pasiendokter')->name('pasiendokter');
});
Route::group(['middleware' => 'auth', 'pasien'],function(){
	Route::get('identitas','MyControll@identitas')->name('griya');
});
Route::get('/generate',function(){
	return bcrypt('1');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
