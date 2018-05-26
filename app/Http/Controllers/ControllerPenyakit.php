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

class ControllerPenyakit extends Controller
{
  public function index()
  {
    $data = DB::table('penyakit')->get();
    $terakhir = DB::table('penyakit')->orderBy('id_penyakit', 'desc')->first();
    if($terakhir==null)
    {
      $angka=1;
    }
    else
    {
      $angka= $terakhir->id_penyakit+1;  
    }
    return view('admin.penyakit',compact('data','angka')); 
  }
  public function edit($id)
  {
    $kelamins =DB::table('roles')->get();
    $data = Db::table('penyakit')->where('id_penyakit','=',$id)->first();
    return view('admin.editpenyakit',compact('kelamins','data','id'));
  }
  public function hapus($id)
  {
    $nama = DB::table('penyakit')->where('id_penyakit','=',$id)->first();
    $data = DB::table('penyakit')->where('id_penyakit','=',$id)->delete();
    if ($data)
    {
      return redirect()->route('penyakit')->with('message','Berhasil1')->with('data',$nama->nama_penyakit);
    }
    else
    {
      return redirect()->route('penyakit')->with('message','Gagal');
    }
  }
  public function masukkandata(Request $request)
  {
    $nama= DB::table('penyakit')->where('id_penyakit','=',$request->id_penyakit)->first();
    if($request->id_penyakit==null)
    {
      $data = DB::table('penyakit')->insert(['nama_penyakit'=>$request->nama,'keterangan_penyakit'=>$request->ket]);
      if ($data)
      {
        return redirect()->route('penyakit')->with('message','Berhasil')->with('data',$request->nama);
      }
      else
      {
        return redirect()->route('penyakit')->with('message','Gagal');
      }
    }
    else
    {
      $data=DB::table('penyakit')->where('id_penyakit','=',$request->id_penyakit)->update(['nama_penyakit'=>$request->nama,'keterangan_penyakit'=>$request->ket]);
      if ($data)
      {
       return redirect()->route('penyakit')->with('message','Berhasil2')->with('data',$request->nama)->with('nama',$nama->nama_penyakit);
     }
     else
     {
      return redirect()->route('penyakit')->with('message','Gagal');
      }
    }
  }
}
