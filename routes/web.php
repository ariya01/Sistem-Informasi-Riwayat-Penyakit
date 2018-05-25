<?php
use App\Models\Role;
use App\User;
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
	Route::get('/home','ControllerAkun@home')->name('home');
	Route::get('/akun','ControllerAkun@index')->name('akun');
	Route::post('/tambahakun','MyControll@tambahakun');
	Route::post('/hapusakun','MyControll@hapusakun');
	Route::post('/ubahakun','MyControll@ubahakun');
	Route::get('/get/{id}','MyControll@getajax')->name('test');
	Route::get('/detail/{id}','ControllerDokter@editdetail')->name('detail');
	Route::post('/isidetail','ControllerDokter@masukkandata');
	Route::get('dokter','ControllerDokter@index');
	Route::get('/dokterdetail/{id}','MyControll@dokterdetail')->name('dokterdetail');
	Route::post('hapusdok','MyControll@hapusdok');
	Route::post('aktifdok','MyControll@aktifdok');
	Route::post('nondok','MyControll@nondok');
	Route::post('tambahdok','MyControll@tambahdok');
	Route::get('/pendidikandok/{id}','MyControll@pendidikandok')->name('pendidikandok');
	Route::get('/getdok/{id}','MyControll@getdok');
	Route::post('/editdok','MyControll@editdok');
	Route::get('pasien','ControllerPasien@index');
	Route::get('/detailpasien/{id}','MyControll@detailpasien');
	Route::get('rumahsakit','MyControll@rumahsakit')->name("rumahsakit");
	Route::get('/obat','ControllerObat@index')->name('obat');
	Route::get('penyakit','Controllerpenyakit@index')->name('penyakit');
	Route::get('penyakitnya/{id}','ControllerPasien@riwayatpenyakit')->name('penyakitnya');
	Route::get('detailnya/{id}','ControllerPasien@detail')->name('detailnya');
	Route::get('alergi/{id}','ControllerPasien@alergi_pasien')->name('alergi');
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
	Route::get('dokternya/{id}','ControllerDokter@detail')->name('dokternya');
	Route::get('pendidikan/{id}','MyControll@pendidikan');
	Route::get('editakun/{id}','ControllerAkun@editform');
	Route::get('ajax1/{id}','MyControll@ajax1');
	Route::get('deleteakun/{id}','MyControll@deleteakun');
	Route::post('editnya','ControllerAkun@masukkandata');
	Route::get('editpenyakitnya/{id}','Controllerpenyakit@edit');
	Route::get('ajax2/{id}','MyControll@ajax2');
	Route::post('editpenyakitku','Controllerpenyakit@masukkandata');
	Route::get('deletepenyakit/{id}','Controllerpenyakit@hapus');
	Route::get('care/{id}','ControllerDokter@care');
	Route::get('editpendidikan/{id}','MyControll@editpendidikan');
	Route::get('detail1/{id}','ControllerPasien@editdetail');
	Route::post('/isidetail1','ControllerPasien@masukkandata');
	Route::get('/editobat/{id}','ControllerObat@editobat');
	Route::get('ajax3/{id}','MyControll@ajax3');
	Route::post('editobatnya','ControllerObat@masukkandata');
	Route::get('deleteobat/{id}','ControllerObat@hapusobat');
	Route::get('editrumah/{id}','MyControll@editrumah');
	Route::get('ajax4/{id}','MyControll@ajax4');
	Route::get('deleterumah/{id}','MyControll@deleterumah');
	Route::post('rumahsakitnya','MyControll@rumahsakitnya');
	Route::get('pemeriksaan/{id}','MyControll@pemeriksaan');
	Route::get('editpenyakitnya1/{id_riwayat}/{id_user}','ControllerPasien@editpenyakit');
	Route::post('kirim','MyControll@kirim');
	Route::get('ajax5/{id}','MyControll@ajax5');
	Route::get("/editalerginya/{id_alergi}/{id_user}",'ControllerPasien@editalergi');
	Route::get('hapusri/{id_penyakit}/{id_user}','MyControll@hapusri');
	Route::get('ajax6/{id}','MyControll@ajax6');
	Route::get('hapusri1/{id_alergi}/{id_user}','MyControll@hapusri1');
	Route::post('kirim1','ControllerPasien@masukkandataalergi');
	Route::get('ajax7/{id}','MyControll@ajax7');
	Route::get('alergiku','ControllerAlergi@index')->name('ubah');
	Route::get('ubah/{id}','ControllerAlergi@ubah');
	Route::get('ajax8/{id}','MyControll@ajax8');
	Route::post('kirim3','ControllerAlergi@masukkandata');
	Route::get('deletehehe/{id}','ControllerAlergi@hapus');
	Route::get('ajax10','MyControll@ajax10');
});
Route::group(['middleware' =>'dokter'], function () {
	Route::get('/rumah','MyControll@rumah')->name('rumah');
	Route::get('/utama','ControllerDokter@daftar')->name('utama');
	Route::get('isi/{id}','MyControll@isi');
	Route::get('hehe/{id}','ControllerDokter@detailpasien');
	Route::get('lihat/{id}','ControllerDokter@lihat');
	Route::get('lihat1/{id}','ControllerDokter@lihatalergi');
	Route::get('lihat2/{id}','ControllerDokter@lihatpemeriksaan')->name('kembali');
	Route::get('ubah1/{id_pemeriksaan}/{id_user}','ControllerDokter@editpemeriksaan');
	Route::get('ajax9/{id}','MyControll@ajax9');
	Route::post('kirim4','ControllerDokter@simpanpemeriksaan');
	Route::get('deletekok/{id_riwayat}/{id_user}','ControllerDokter@hapuspemeriksaan');
	Route::get('ajax11','MyControll@ajax11');
});
Route::group(['middleware' => 'pasien'],function(){
	Route::get('identitas','MyControll@identitas')->name('griya');
});
Route::get('/generate',function(){
	return bcrypt('1');
});

Auth::routes();
Route::get('adminhome','MyControll@adminhome');
// Route::get('/home', 'HomeController@index')->name('home');
