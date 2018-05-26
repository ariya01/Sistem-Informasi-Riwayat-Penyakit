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

class ControllerObat extends Controller
{
  public function index()
  {
    $data = DB::table('obat')->get();
    $terakhir = DB::table('obat')->orderBy('id_obat', 'desc')->first();
    if($terakhir==null)
    {
      $angka=1;
    }
    else
    {
      $angka= $terakhir->id_obat+1;  
    }
    return view('admin.obat',compact('data','angka')); 
  }

  public function editobat($id)
  {
    $data = Db::table('obat')->where('id_obat','=',$id)->first();
    return view('admin.editobat',compact('kelamins','data','id'));
  }

  public function masukkandata(Request $request)
  {
    $nama= DB::table('obat')->where('id_obat','=',$request->id_obat)->first();
    if($request->id_obat==null)
    {
      $data = DB::table('obat')->insert(['nama_obat'=>$request->nama,'ket_obat'=>$request->ket]);
      if ($data)
      {
        return redirect()->route('obat')->with('message','Berhasil1')->with('data',$request->nama);
      }
      else
      {
        return redirect()->route('obat')->with('message','Gagal');
      }
    }
    else
    {
      $data=DB::table('obat')->where('id_obat','=',$request->id_obat)->update(['nama_obat'=>$request->nama,'ket_obat'=>$request->ket]);
      if ($data)
      {
       return redirect()->route('obat')->with('message','Berhasil2')->with('data',$request->nama)->with('nama',$nama->nama_obat);
     }
     else
     {
      return redirect()->route('obat')->with('message','Gagal');
      }
    }
  }
  public function hapusobat($id)
  {
    $nama = DB::table('obat')->where('id_obat','=',$id)->first();
    $data = DB::table('obat')->where('id_obat','=',$id)->delete();
    if ($data)
    {
      return redirect()->route('obat')->with('message','Berhasil')->with('data',$nama->nama_obat);
    }
    else
    {
      return redirect()->route('obat')->with('message','Gagal');
    }
  }
}
