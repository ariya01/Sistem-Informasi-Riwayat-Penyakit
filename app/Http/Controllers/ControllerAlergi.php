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

class ControllerAlergi extends Controller
{
  public function index()
  {
    $data = DB::table('alergi')->get();
    $terakhir = DB::table('alergi')->orderBy('id_alergi', 'desc')->first();
    if($terakhir==null)
    {
      $angka=1;
    }
    else
    {
      $angka= $terakhir->id_alergi+1;  
    }
    return view('admin.alerginya',compact('data','angka'));
  }
  public function ubah($id)
  {
    $data = Db::table('alergi')->where('id_alergi','=',$id)->first();
    return view('admin.ubahalergi',compact('kelamins','data','id'));
  }
  public function masukkandata(Request $request)
  {
    $nama = db::table('alergi')->where('id_alergi','=',$request->id_alergi)->first();
    if($request->id_alergi==null)
    {
      $data = DB::table('alergi')->insert(['nama_alergi'=>$request->nama,'keterangan'=>$request->ket]);
      if ($data)
      {
        return redirect()->route('ubah')->with('message','Berhasil1')->with('data',$request->nama);
      }
      else
      {
        return redirect()->route('ubah')->with('message','Gagal');
      }
    }
    else
    {
      $data=DB::table('alergi')->where('id_alergi','=',$request->id_alergi)->update(['nama_alergi'=>$request->nama,'keterangan'=>$request->ket]);
      if ($data)
      {
       return redirect()->route('ubah')->with('message','Berhasil2')->with('data',$request->nama)->with('nama',$nama->nama_alergi);
     }
     else
     {
      return redirect()->route('ubah')->with('message','Gagal');
      }
    }
  }
  public function hapus($id)
  {
    $nama = DB::table('alergi')->where('id_alergi','=',$id)->first();
    $data = DB::table('alergi')->where('id_alergi','=',$id)->delete();
    if ($data)
    {
      return redirect()->route('ubah')->with('message','Berhasil')->with('data',$nama->nama_alergi);
    }
    else
    {
      return redirect()->route('ubah')->with('message','Gagal');
    }
  }
}
