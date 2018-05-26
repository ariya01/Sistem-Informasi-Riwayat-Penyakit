<?php

namespace App\Http\Controllers;
use DB;
use Carbon\carbon;
use Auth;
use App\Detail;
use App\User;
use App\Rolenya;
use App\Dokter;
use Illuminate\Http\Request;

class ControllerDokter extends Controller
{
 public function index()
 {
   $data = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->where('name','=','dokter')->leftjoin('detail','detail.id_user','users.id')->leftJoin('dokter','users.id','dokter.id_user')->leftJoin('strata','strata.id_strata','dokter.id_strata')->leftjoin('spesialis','spesialis.id_spesialis','dokter.id_spesialis')->select('users.id','detail.tanggal','users.name_user','strata.nama_strata','spesialis.nama_spesialis','detail.id_det','detail.ktp')->get();
    // dd($data);
   return view('admin.dokter',compact('data'));
 }
 public function detail($id)
 {
   $detail =Detail::where('id_user','=',$id)->first();
   $personal =User::where('id','=',$id)->first();  
    	// dd($detail);
   return view('admin.dokternya',compact('detail','personal'));   
 }
 public function editdetail($id)
 {
   $kelamins =DB::table('kelamins')->get();
   $data = Detail::where('id_user','=',$id)->first();
   return view('admin.detail',compact('kelamins','data','id'));
 }
 public function masukkandata(Request $request)
 {
  if($request->id) 
  {
    $hasil = Detail::where('id_user','=',$request->id)->
    update(['id_user'=>$request->id_user,'ktp'=>$request->ktp,'golongan'=>$request->gol,'id_jk'=>$request->kel,'alamat'=>$request->alamat,'berat'=>$request->berat,'tinggi'=>$request->tinggi,'tanggal'=>$request->tanggal,'kontak'=>$request->kontak,'status'=>0]);
    $nama = User::where('id','=',$request->id)->first();
    if($hasil)
    {
      return redirect()->route('dokternya',$request->id_user)->with('message','Berhasil')->with('data',$nama->name_user);
    }
    else
    {
      return redirect()->route('dokternya',$request->id_user)->with('message','Gagal');
    }
  }
  else
  {
    $data = new Detail;
    $data->id_user = $request->id_user;
    $data->ktp = $request->ktp;
    $data->golongan = $request->gol;
    $data->id_jk = $request->kel;
    $data->alamat =$request->alamat;
    $data->berat =$request->berat;
    $data->tinggi =$request->tinggi;
    $data->tanggal = $request->tanggal;
    $data->kontak = $request->kontak;
    $data->status =0;
    if($data->save())
      {
      return redirect()->route('dokternya',$request->id_user)->with('message','Berhasil1');
      }
    else
      {
      return redirect()->route('dokternya',$request->id_user)->with('message','Gagal');
      }
    }
  }
public function care($id)
{
  $nama = DB::table('users')->where('id','=',$id)->first();
  $personal = DB::table('riwayat')->where('dokter','=',$id)->leftjoin('users','riwayat.pasien','users.id')->get();
    // dd($nama);
  return view('admin.care',compact('personal','id','nama'));
}
public function daftar()
{
  $data = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->where('name','=','pasien')->leftjoin('detail','detail.id_user','users.id')->select('users.id','detail.tanggal','id_det','name_user','ktp')->get();
  return view('dokter.pasien',compact('data'));
}
public function detailpasien($id)
{
  $detail =Detail::where('id_user','=',$id)->first();
  $personal =User::where('id','=',$id)->first();  
  return view('dokter.detail',compact('detail','personal'));
}

public function lihat($id)
{
  $penyakit = DB::table('penyakitnya')->leftjoin('penyakit','penyakit.id_penyakit','penyakitnya.id_penyakit')->where('id_user','=',$id)->select("penyakitnya.id_penyakitnya","penyakitnya.id_penyakit","penyakitnya.id_user","penyakitnya.created_at","penyakit.nama_penyakit")->get();
  $personal =User::where('id','=',$id)->first();
  return view('dokter.lihat',compact('penyakit','personal','angka'));
}

public function lihatalergi($id)
{
  $personal =User::where('id','=',$id)->first();  
  $alergi = DB::table('alerginya')->leftjoin('alergi','alergi.id_alergi','alerginya.id_alergi')->where('id_user','=',$id)->get();
  return view('dokter.alergi',compact('personal','alergi','angka'));
}

public function lihatpemeriksaan($id)
{
  $personal = DB::table('riwayat')->where('pasien','=',$id)->get();
  $nama = DB::table('users')->where('id','=',$id)->first();
  $terakhir = DB::table('riwayat')->orderBy('id_riwayat', 'desc')->first();
  if($terakhir==null)
  {
    $angka=1;
  }
  else
  {
    $angka= $terakhir->id_riwayat+1;  
  }
  return view('dokter.care',compact('nama','personal','id','angka'));
}
public function editpemeriksaan($id_riwayat,$id_user)
{
  $data = Db::table('riwayat')->where('id_riwayat','=',$id_riwayat)->first();
  return view('dokter.editalergi',compact('penyakit','data','id_user'));
}
public function simpanpemeriksaan(Request $request)
{
  if($request->id_riwayat==null)
  {
    $now =Carbon::now();
    $tahun = $now->year;
    $data = DB::table('riwayat')->insert(['pasien'=>$request->id_user,'dokter'=>Auth::id(),'S'=>$request->subyek,'created_at'=>Carbon::now(),'O'=>$request->objek,'A'=>$request->asssesmen,'P'=>$request->plan,'tahun'=>$tahun]);
    if ($data)
    {
      return redirect()->route('kembali',$request->id_user)->with('message','Berhasil1');
    }
    else
    {
      return redirect()->route('kembali',$request->id_user)->with('message','Gagal');
    }
  }
  else
  {
    $now =Carbon::now();
    $tahun = $now->year;
    $data=DB::table('riwayat')->where('id_riwayat','=',$request->id_riwayat)->update(['pasien'=>$request->id_user,'dokter'=>Auth::id(),'S'=>$request->subyek,'created_at'=>Carbon::now(),'O'=>$request->objek,'A'=>$request->asssesmen,'P'=>$request->plan,'tahun'=>$tahun]);
    if ($data)
    {
     return redirect()->route('kembali',$request->id_user)->with('message','Berhasil2');
    }
   else
    {
    return redirect()->route('kembali',$request->id_user)->with('message','Gagal');
    }
  }
}
public function hapuspemeriksaan($id_riwayat,$id_user)
{
  $data = DB::table('riwayat')->where('id_riwayat','=',$id_riwayat)->delete();
  if ($data)
  {
   return redirect()->route('kembali',$id_user)->with('message','Berhasil');
  }
 else
  {
  return redirect()->route('kembali',$id_user)->with('message','Gagal');
  }
} 
}
