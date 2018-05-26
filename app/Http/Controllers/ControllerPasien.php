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

class ControllerPasien extends Controller
{
  public function index()
  {
    $data = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->where('name','=','pasien')->leftjoin('detail','detail.id_user','users.id')->select('users.id','detail.tanggal','id_det','name_user','ktp')->get();
    return view ('admin.pasien',compact('data'));
  }
  public function detail($id)
  {
    $detail =Detail::where('id_user','=',$id)->first();
    $personal =User::where('id','=',$id)->first();  
    return view('admin.detailnya',compact('detail','personal'));
  }
  public function editdetail($id)
  {
    $kelamins =DB::table('kelamins')->get();
    $data = Detail::where('id_user','=',$id)->first();
    return view('admin.detail1',compact('kelamins','data','id'));
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
        return redirect()->route('detailnya',$request->id_user)->with('message','Berhasil')->with('data',$nama->name_user);
      }
      else
      {
        return redirect()->route('detailnya',$request->id_user)->with('message','Gagal');
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
        return redirect()->route('detailnya',$request->id_user)->with('message','Berhasil1');
      }
      else
      {
        return redirect()->route('detailnya',$request->id_user)->with('message','Gagal');
      }
    }
  }
  public function alergi_pasien($id)
  {
    $personal =User::where('id','=',$id)->first();  
    $alergi = DB::table('alerginya')->leftjoin('alergi','alergi.id_alergi','alerginya.id_alergi')->where('id_user','=',$id)->get();
    $terakhir = DB::table('alerginya')->orderBy('id_alerginya', 'desc')->first();
    if($terakhir==null)
    {
      $angka=1;
    }
    else
    {
      $angka= $terakhir->id_alerginya+1;  
    }
    return view('admin.alergi',compact('personal','alergi','angka'));
  }
  public function editalergi($id_riwayat,$id_user)
  {
    $data = Db::table('alerginya')->where('id_alerginya','=',$id_riwayat)->where('id_user','=',$id_user)->first();
    $penyakit = Db::table('alergi')->get();
    return view('admin.editalerginya',compact('penyakit','data','id_user'));
  }
  public function masukkandataalergi(Request $request)
  {
    $nama = Db::table('alergi')->where('id_alergi','=',$request->id_alergi)->first();
    if($request->id_alerginya==null)
    {
      $data = DB::table('alerginya')->insert(['id_alergi'=>$request->id_alergi,'id_user'=>$request->id_user]);
      if ($data)
      {
        return redirect()->route('alergi',$request->id_user)->with('message','Berhasil')->with('data',$nama->nama_alergi);
      }
      else
      {
        return redirect()->route('alergi',$request->id_user)->with('message','Gagal');
      }
    }
    else
    {
      $data=DB::table('alerginya')->where('id_alerginya','=',$request->id_alerginya)->update(['id_alergi'=>$request->id_alergi]);
      if ($data)
      {
       return redirect()->route('alergi',$request->id_user)->with('message','Berhasil2')->with('data',$nama->nama_alergi);
     }
     else
     {
      return redirect()->route('alergi',$request->id_user)->with('message','Gagal');
      }
    }
  }
  public function riwayatpenyakit($id)
  {
    $penyakit = DB::table('penyakitnya')->leftjoin('penyakit','penyakit.id_penyakit','penyakitnya.id_penyakit')->where('id_user','=',$id)->select("penyakitnya.id_penyakitnya","penyakitnya.id_penyakit","penyakitnya.id_user","penyakitnya.created_at","penyakit.nama_penyakit")->get();
     $personal =User::where('id','=',$id)->first();
    $terakhir = DB::table('penyakitnya')->orderBy('id_penyakitnya', 'desc')->first();
    if($terakhir==null)
    {
      $angka=1;
    }
    else
    {
      $angka= $terakhir->id_penyakitnya+1;  
    }
    return view('admin.riwayatpenyakit',compact('penyakit','personal','angka'));
  }
  public function editpenyakit($id_riwayat,$id_user)
  {
    $data = Db::table('penyakitnya')->where('id_penyakitnya','=',$id_riwayat)->where('id_user','=',$id_user)->first();
    $penyakit = Db::table('penyakit')->get();
    return view('admin.editpenyakitnya',compact('penyakit','data','id_user'));
  }
  public function masukkandatapenyakit(Request $request)
  {
    if ($request->baru!=null)
      {
      $new = DB::table('penyakit')->insert(['nama_penyakit'=>$request->baru,'keterangan_penyakit'=>"penyakit baru"]);
      $cari = DB::table('penyakit')->where('nama_penyakit','=',$request->baru)->first();
      if($request->id_penyakitnya==null)
      {
        $data = DB::table('penyakitnya')->insert(['id_penyakitnya'=>$request->id_penyakitnya,'id_penyakit'=>$cari->id_penyakit,'id_user'=>$request->id_user,'created_at'=>$request->tanggal]);
        if ($data)
        {
          return redirect()->route('penyakitnya',$request->id_user)->with('message','Berhasil1')->with('data',$cari->nama_penyakit);
        }
        else
        {
          return redirect()->route('penyakitnya',$request->id_user)->with('message','Gagal');
        }
      }
      else
      {
        $data=DB::table('penyakitnya')->where('id_penyakitnya','=',$request->id_penyakitnya)->update(['id_penyakit'=>$request->penyakit,'created_at'=>$request->tanggal]);
        if ($data)
          {
          return redirect()->route('penyakitnya',$request->id_user)->with('message','Berhasil2')->with('data',$cari->nama_penyakit);
          }
          else
          {
          return redirect()->route('penyakitnya',$request->id_user)->with('message','Gagal');
          }
      }
    }
    else
    {
      $nama = Db::table('penyakit')->where('id_penyakit','=',$request->penyakit)->first();
      if($request->id_penyakitnya==null)
      {
        $data = DB::table('penyakitnya')->insert(['id_penyakitnya'=>$request->id_penyakitnya,'id_penyakit'=>$request->penyakit,'id_user'=>$request->id_user,'created_at'=>$request->tanggal]);
        if ($data)
        {
          return redirect()->route('penyakitnya',$request->id_user)->with('message','Berhasil1')->with('data',$nama->nama_penyakit);
        }
        else
        {
          return redirect()->route('penyakitnya',$request->id_user)->with('message','Gagal');
        }
      }
      else
      {
        $data=DB::table('penyakitnya')->where('id_penyakitnya','=',$request->id_penyakitnya)->update(['id_penyakit'=>$request->penyakit,'created_at'=>$request->tanggal]);
        if ($data)
        {
         return redirect()->route('penyakitnya',$request->id_user)->with('message','Berhasil2')->with('data',$nama->nama_penyakit);
       }
       else
       {
        return redirect()->route('penyakitnya',$request->id_user)->with('message','Gagal');
      }
    }
  }
}
}