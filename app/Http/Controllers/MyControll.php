<?php

namespace App\Http\Controllers;
use Carbon\carbon;
use DB;
use Auth;
use App\Detail;
use App\User;
use App\Rolenya;
use App\Dokter;
use Illuminate\Http\Request;

class MyControll extends Controller
{
    //
  public function login()
  {
    if (Auth::check())
    {
      $user = Auth::user()->roles->first()->name;
      if ($user == 'admin')
       {
        return redirect()->route('home');
      }
      elseif ($user == 'pasien') 
      {
        return redirect()->route('griya');
      }
      elseif ($user == 'dokter') 
      {
        return redirect()->route('rumah');
      }
    }
    else
    {
      return view ('welcome');
    }
  }
  public function signin(Request $request)
  {
   if ($request->password!=null)
   {
     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
       {
         $user = Auth::user()->roles->first()->name;
         if ($user == 'admin')
         {
          return redirect()->route('home');
        }
        elseif ($user == 'pasien') 
        {
          return redirect()->route('griya');
        }
        elseif ($user == 'dokter') 
        {
          return redirect()->route('rumah');
        }
      }
      else
      {
       return redirect()->route('login')->with('message','Gagal');
     }
   }
   else
   {
      return redirect()->route('login')->with('message','Gagal');
   }
 }
 public function ajax10()
 {
  $personal =DB::table('riwayat')->groupBy('tahun')->select(DB::raw('tahun,count(*) as periksa'))->get();
    // dd($personal);    
    return json_encode($personal);
 }
  public function ajax11()
 {
  $personal =DB::table('riwayat')->where('dokter','=',Auth::user()->id)->groupBy('tahun')->select(DB::raw('tahun,count(*) as periksa'))->get();
    // dd($personal);    
    return json_encode($personal);
 }

  public function logout()
  {
    Auth::logout();
    return redirect('/');
  }
  public function rumah()
  {
    $jumlah = DB::table('riwayat')->where('dokter','=',Auth::user()->id)->count();
    return view('dokter.home',compact('jumlah'));
  } 
  public function hak()
  {
    return view ('hak');
  }
  public function tambahakun(Request $request)
  {
    if (User::where('email', '=', $request->email)->exists())
    {
      return redirect()->route('akun')->with('message','Gagal');
    }
    else
    {
    $user = new User;
    $user->name_user = $request->nama;
    $user->email = $request->email;
    $user->password = bcrypt($request->password);
    $user->save();
    $data = User::where('email',$request->email)->firstOrFail();
    $role = new Rolenya;
    $role->user_id = $data->id;
    $role->role_id = $request->role;
    $role->save(); 
    if($role && $user)
      {
        return redirect()->route('akun')->with('message','Berhasil')->with('data',$request->nama);
      }
      else
      {
        return redirect()->route('akun')->with('message','Gagal1');
      }
    }
  }
  public function ubahakun(Request $request)
  {
    // dd($request->id_user);
    if (User::where('email', '=', $request->email1)->exists())
    {
      return redirect()->route('akun')->with('message','Gagal');
    }
    else
    {
      $data = User::find($request->id_user);
      $data->name_user = $request->nama1;
      $data->email = $request->email1;
      $data->password = bcrypt($request->password1);
      $data->save();
      $role = Rolenya::where('user_id','=',$request->id_user)->firstOrFail()->delete();
    // $role->delete();
    // dd($role);
      $role = new Rolenya;
      $role->user_id = $request->id_user;
      $role->role_id = $request->role;
      if($data->save() && $role->save())
      {
       return redirect()->route('akun')->with('message','Berhasil2')->with('data',$request->nama1);
      }
    }
  }
  public function getajax(Request $request,$id)
  {
    $data = $request->id;
    $hasil = Detail::where('id_user','=',$data)->first();
    return json_encode($hasil);   
  }
  
  public function dokterdetail($id)
  {
    $data = DB::table('dokter')->where('id_user','=',$id)->leftJoin('strata','strata.id_strata','dokter.id_strata')->leftjoin('spesialis','spesialis.id_spesialis','dokter.id_spesialis')->leftjoin('univ','univ.id_univ','dokter.id_univ')->get();
    // dd($data);
    $personal =User::where('users.id','=',$id)->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->select('users.id','roles.name','users.name_user')->first();    
    $detail =Detail::where('id_user','=',$id)->first();
    // dd($personal);
    $strata =Db::table('strata')->get();
    $univ = Db::table('univ')->get();
    $spesialis = Db::table('spesialis')->get();
    // dd($strata);
    $pendidikan = Db::table('pendidikan')->get();
    return view('admin.dokterdetail',compact('pendidikan','spesialis','univ','data','personal','detail','strata'));
  }
  public function hapusdok(Request $request)
  {
    $cek =Db::table('dokter')->where('id_dokter','=',$request->hapus)->where('status','=','0')->first();
    $kembali = Db::table('dokter')->where('id_dokter','=',$request->hapus)->first();
    $halo = DB::table('dokter')->where('id_user','=',$kembali->id_user)->where('status','=',1)->count();
    // dd($halo);
    if($cek)
    {
      if($halo==1)
      {
        $data = Db::table('dokter')->where('id_dokter','=',$request->hapus)->where('status','=','0')->delete();
        // dd($kembali);
        if($data)
        {
          return redirect()->route('dokterdetail',$kembali->id_user)->with('message','Berhasil');      
        }
        else
        {
          return redirect()->route('dokterdetail',$kembali->id_user)->with('message','Gagal');
        }
      }
      else
      {
        return redirect()->route('dokterdetail',$kembali->id_user)->with('message','Gagal2');   
      }
    }
    else
    {
      return redirect()->route('dokterdetail',$kembali->id_user)->with('message','Gagal1');
    }  
  }
  public function aktifdok(Request $request)
  {
    $kembali = Db::table('dokter')->where('id_dokter','=',$request->cek)->first();
    $halo = DB::table('dokter')->where('id_user','=',$kembali->id_user)->where('status','=',1)->count();
    // dd($halo);
    if($halo==1)
    {
      return redirect()->route('dokterdetail',$kembali->id_user)->with('message','Gagal5');
    }
    else
    {
      $aktif = Db::table('dokter')->where('id_dokter','=',$request->cek)->update(['status'=>1]);
      if($aktif)
      {
       return redirect()->route('dokterdetail',$kembali->id_user)->with('message','Berhasil1'); 
      }
      else
      {
      return redirect()->route('dokterdetail',$kembali->id_user)->with('message','Gagal3'); 
      }
    }
  }
  public function nondok(Request $request)
  {
    $kembali = Db::table('dokter')->where('id_dokter','=',$request->cek)->first();
    $non = Db::table('dokter')->where('id_dokter','=',$request->cek)->update(['status'=>0]);
    if($non)
    {
      return redirect()->route('dokterdetail',$kembali->id_user)->with('message','Berhasil2'); 
    }
    else
    {
     return redirect()->route('dokterdetail',$kembali->id_user)->with('message','Gagal4'); 
    }
  }
  public function tambahdok(Request $request)
  {
    // dd($request->id);
    $data = new Dokter;
    $data->id_user = $request->id;
    $data->id_strata = $request->strata;
    $data->id_univ = $request->univ;
    $data->id_pendidikan = $request->pendidikan;
    $data->id_spesialis = $request->spesial;
    $data->status = 0;
    if($data->save())
    {
      return redirect()->route('dokterdetail',$request->id)->with('message','Berhasil3'); 
    }
    else
    {
      return redirect()->route('dokterdetail',$request->id)->with('message','Gagal6'); 
    }
  }
  public function pendidikandok($id)
  {
    $detail =Dokter::where('id_dokter','=',$id)->first();
    $strata =Db::table('strata')->get();
    $univ = Db::table('univ')->get();
    $spesialis = Db::table('spesialis')->get();
    $pendidikan = Db::table('pendidikan')->get();
    return view('admin.pendidikandok',compact('id','detail','strata','univ','spesialis','pendidikan'));
  }
  public function getdok(Request $request,$id)
  {
    $data = $request->id;
    $hasil = Dokter::where('id_dokter','=',$data)->first();
    return json_encode($hasil);    
  }
  public function editdok(Request $request)
  {
    $hasil = Dokter::where('id_dokter','=',$request->id)->
      update(['id_user'=>$request->id_user,'id_strata'=>$request->strata,'id_pendidikan'=>$request->pendidikan,'id_univ'=>$request->univ,'id_spesialis'=>$request->spesialis,'status'=>0]);
    if($hasil)
    {
      return redirect()->route('dokterdetail',$request->id_user)->with('message','Berhasil4'); 
    }
    else
    {
      return redirect()->route('dokterdetail',$request->id_user)->with('message','Gagal7'); 
    }
  }

  public function detailpasien($id)
  {
    $data = DB::table('dokter')->where('id_user','=',$id)->leftJoin('strata','strata.id_strata','dokter.id_strata')->leftjoin('spesialis','spesialis.id_spesialis','dokter.id_spesialis')->leftjoin('univ','univ.id_univ','dokter.id_univ')->get();
    // dd($data);
    $personal =User::where('users.id','=',$id)->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_user.role_id','roles.id')->select('users.id','users.name_user','roles.display_name')->first();    
    $detail =Detail::where('id_user','=',$id)->first();
    // dd($personal);
    return view('admin.detailpasien',compact('personal','detail'));
  } 
  public function keluarga($id)
  {
    $personal =User::where('id','=',$id)->first();
    return view ('admin.keluarga',compact('personal'));
  }
  public function tambahrs(Request $request)
  {
    $data=DB::table('rs')->insert(['nama_rumah'=>$request->nama,'alamat_rumah'=>$request->alamat,'keterangan_rumah'=>$request-> keterangan]);
    if ($data)
    {
      return redirect()->route('rumahsakit')->with('message','Berhasil')->with('data',$request->nama);
    }
    else
    {
      return redirect()->route('rumahsakit')->with('message','Gagal');
    }
  }
  public function hapusrs(Request $request)
  {
    $nama = DB::table('rs')->where('id_rumah','=',$request->id_rs)->first();
    // dd($nama);
    $data = DB::table('rs')->where('id_rumah','=',$request->id_rs)->delete();
    if ($data)
    {
      return redirect()->route('rumahsakit')->with('message','Berhasil1')->with('data',$nama->nama_rumah);
    }
    else
    {
      return redirect()->route('rumahsakit')->with('message','Gagal');
    }
  }
  public function editrs(Request $request)
  {
    // dd($request->id_user);
    $data=DB::table('rs')->where('id_rumah','=',$request->id_user)->update(['nama_rumah'=>$request->nama,'alamat_rumah'=>$request->alamat,'keterangan_rumah'=>$request-> keterangan]);
     if ($data)
    {
     return redirect()->route('rumahsakit')->with('message','Berhasil2')->with('data',$request->nama);
    }
    else
    {
      return redirect()->route('rumahsakit')->with('message','Gagal');
    }
  }
  public function hapusobt(Request $request)
  {
    $nama = DB::table('obat')->where('id_obat','=',$request->id_rs)->first();
    // dd($nama);
    $data = DB::table('obat')->where('id_obat','=',$request->id_rs)->delete();
    if ($data)
    {
      return redirect()->route('obat')->with('message','Berhasil')->with('data',$nama->nama_obat);
    }
    else
    {
      return redirect()->route('rumahsakit')->with('message','Gagal');
    }
  }
  public function tambahobt(Request $request)
  {
     $data=DB::table('obat')->insert(['nama_obat'=>$request->nama,'ket_obat'=>$request->ket]);
    if ($data)
    {
      return redirect()->route('obat')->with('message','Berhasil1')->with('data',$request->nama);
    }
    else
    {
      return redirect()->route('obat')->with('message','Gagal');
    }
  }
  public function editobt(Request $request)
  {
    // dd($request->id_user);
   $data=DB::table('obat')->where('id_obat','=',$request->id_user)->update(['nama_obat'=>$request->nama,'ket_obat'=>$request->ket]);
    if ($data)
    {
     return redirect()->route('obat')->with('message','Berhasil2')->with('data',$request->nama);
    }
    else
    {
      return redirect()->route('obat')->with('message','Gagal');
    }
  }
  public function tambahpenyakit(Request $request)
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
  public function hapuspenyakit(Request $request)
  {
    $nama = DB::table('penyakit')->where('id_penyakit','=',$request->id_rs)->first();
    // dd($nama);
    $data = DB::table('penyakit')->where('id_penyakit','=',$request->id_rs)->delete();
    if ($data)
    {
      return redirect()->route('penyakit')->with('message','Berhasil1')->with('data',$nama->nama_penyakit);
    }
    else
    {
      return redirect()->route('penyakit')->with('message','Gagal');
    }
  }
  public function editpenyakit(Request $request)
  {
    $data=DB::table('penyakit')->where('id_penyakit','=',$request->id_user)->first();
    // $dd($data);
    $data=DB::table('penyakit')->where('id_penyakit','=',$request->id_user)->update(['nama_penyakit'=>$request->nama,'keterangan_penyakit'=>$request->ket]);
    if ($data)
    {
     return redirect()->route('penyakit')->with('message','Berhasil2')->with('data',$request->nama);
    }
    else
    {
      return redirect()->route('penyakit')->with('message','Gagal');
    }
  }
  public function pendidikan($id)
  {
    $penyakit = DB::table('dokter')->where('id_user','=',$id)->leftjoin('strata','strata.id_strata','dokter.id_strata')->leftjoin('univ','univ.id_univ','dokter.id_univ')->leftjoin('pendidikan','pendidikan.id_pendidikan','dokter.id_pendidikan')->leftJoin('spesialis','spesialis.id_spesialis','dokter.id_spesialis')->get();
    // dd($penyakit);
    $personal =User::where('id','=',$id)->first();  
    return view('admin.pendidikannya',compact('penyakit','personal')); 
  }
  public function identitas()
  {
    $id = Auth::user()->id;
    $personal =User::where('users.id','=',$id)->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_user.role_id','roles.id')->select('users.id','users.name_user','roles.display_name')->first();    
    $detail =Detail::where('id_user','=',$id)->first();
    // dd($personal);
    return view('pasien.identitas',compact('personal','detail'));
  }
  public function ajax1(Request $request,$id)
  {
    $personal =User::where('users.id','=',$id)->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_user.role_id','roles.id')->select('users.id','users.name_user','roles.id as role','users.email')->first();    
    return json_encode($personal);   
  }
  public function deleteakun($id)
  {
    $nama = DB::table('users')->where('id','=',$id)->first();
    $personal = User::destroy($id);
    if($personal)
    {
      return redirect()->route('akun')->with('message','Berhasil1')->with('data',$nama->name_user);
    }
    else
    {
      return redirect()->route('akun')->with('message','Gagal2');
    }
  }
  

  public function ajax2(Request $request,$id)
  {
    $personal =DB::table('users')->where('users.id','=',$id)->leftJoin('role_user','users.id','role_user.user_id')->first();
    // dd($personal);    
    return json_encode($personal);   
  }
  public function editpendidikan($id)
  {
    $data = db::table('dokter')->where('id_dokter','=',$id)->first();
    // dd($data);
    return view ('admin.editpendidikan',compact('data'));   
  }
  public function ajax3(Request $request,$id)
  {
    $personal =DB::table('obat')->where('id_obat','=',$id)->first();
    // dd($personal);    
    return json_encode($personal);   
  }
  public function rumahsakit()
  {
    $data = DB::table('rs')->get();
    $terakhir = DB::table('rs')->orderBy('id_rumah', 'desc')->first();
    if($terakhir==null)
    {
      $angka=1;
    }
    else
    {
      $angka= $terakhir->id_rumah+1;  
    }
    return view('admin.rumahsakit',compact('data','angka'));
  }
  public function editrumah($id)
  {
    $data = Db::table('rs')->where('id_rumah','=',$id)->first();
    return view('admin.editrumah',compact('kelamins','data','id'));
  }
   public function ajax4(Request $request,$id)
  {
    $personal =DB::table('rs')->where('id_rumah','=',$id)->first();
    // dd($personal);    
    return json_encode($personal);   
  }
  public function deleterumah($id)
  {
    $nama = DB::table('rs')->where('id_rumah','=',$id)->first();
    $data = DB::table('rs')->where('id_rumah','=',$id)->delete();
    if ($data)
    {
      return redirect()->route('rumahsakit')->with('message','Berhasil1')->with('data',$nama->nama_rumah);
    }
    else
    {
      return redirect()->route('rumahsakit')->with('message','Gagal');
    }
  }
  public function rumahsakitnya(Request $request)
  {
    if($request->id_rumah==null)
    {
      $data = DB::table('rs')->insert(['nama_rumah'=>$request->nama,'alamat_rumah'=>$request->alamat,'keterangan_rumah'=>$request->ket]);
      if ($data)
      {
        return redirect()->route('rumahsakit')->with('message','Berhasil')->with('data',$request->nama);
      }
      else
      {
        return redirect()->route('rumahsakit')->with('message','Gagal');
      }
    }
    else
    {
      $data=DB::table('rs')->where('id_rumah','=',$request->id_rumah)->update(['nama_rumah'=>$request->nama,'keterangan_rumah'=>$request->ket,'alamat_rumah'=>$request->alamat]);
      if ($data)
      {
       return redirect()->route('rumahsakit')->with('message','Berhasil2')->with('data',$request->nama);
     }
     else
     {
      return redirect()->route('rumahsakit')->with('message','Gagal');
      }
    }
  }
   public function pemeriksaan($id)
  {
    // $penyakit = DB::table('penyakitnya')->leftjoin('penyakit','penyakit.id_penyakit','penyakitnya.id_penyakit')->where('id_user','=',$id)->get();
     // $personal =User::where('id','=',$id)->first();  
    $personal = DB::table('riwayat')->where('pasien','=',$id)->leftjoin('users','users.id','riwayat.dokter')->get();
    // dd($personal);
    $nama = DB::table('users')->where('id','=',$id)->first();
    return view('admin.pemeriksaan',compact('nama','personal','id'));
  }

  
  public function ajax5(Request $request,$id)
  {
    $personal =DB::table('penyakitnya')->where('id_penyakitnya','=',$id)->first();
    // dd($personal);    
    return json_encode($personal);   
  }
  public function hapusri($id_penyakit,$id_user)
  {
    $nama = DB::table('penyakitnya')->where('id_penyakitnya','=',$id_penyakit)->leftjoin('penyakit','penyakit.id_penyakit','penyakitnya.id_penyakit')->first();
    $data = DB::table('penyakitnya')->where('id_penyakitnya','=',$id_penyakit)->delete();
    if ($data)
    {
      return redirect()->route('penyakitnya',$id_user)->with('message','Berhasil')->with('data',$nama->nama_penyakit);
    }
    else
    {
      return redirect()->route('penyakitnya',$id_user)->with('message','Gagal');
    }
  } 
  public function ajax6(Request $request,$id)
  {
    $personal =DB::table('alerginya')->where('id_alerginya','=',$id)->first();
    // dd($personal);    
    return json_encode($personal);   
  }
    public function hapusri1($id_alergi,$id_user)
  {
    $nama = DB::table('alerginya')->where('id_alerginya','=',$id_alergi)->leftjoin('alergi','alerginya.id_alergi','alergi.id_alergi')->first();
    $data = DB::table('alerginya')->where('id_alerginya','=',$id_alergi)->delete();
    if ($data)
    {
      return redirect()->route('alergi',$id_user)->with('message','Berhasil1')->with('data',$nama->nama_alergi);
    }
    else
    {
      return redirect()->route('alergi',$id_user)->with('message','Gagal');
    }
  }
   public function ajax7(Request $request,$id)
  {
    $personal =DB::table('penyakit')->where('id_penyakit','=',$id)->first();
    // dd($personal);    
    return json_encode($personal);   
  }
  public function ajax8(Request $request,$id)
  {
    $personal =DB::table('alergi')->where('id_alergi','=',$id)->first();
    // dd($personal);    
    return json_encode($personal);   
  }
  

   public function isi($id)
  {
    $data = DB::table('dokter')->where('id_user','=',$id)->leftJoin('strata','strata.id_strata','dokter.id_strata')->leftjoin('spesialis','spesialis.id_spesialis','dokter.id_spesialis')->leftjoin('univ','univ.id_univ','dokter.id_univ')->get();
    // dd($data);
    $personal =User::where('users.id','=',$id)->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_user.role_id','roles.id')->select('users.id','users.name_user','roles.display_name')->first();    
    $detail =Detail::where('id_user','=',$id)->first();
    // dd($personal);
    return view('dokter.hehe',compact('personal','detail'));
  }
   public function ajax9(Request $request,$id)
  {
    $personal =DB::table('riwayat')->where('id_riwayat','=',$id)->first();
    // dd($personal);    
    return json_encode($personal);   
  }
  public function adminhome()
  {
    $dokter = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->where('name','=','dokter')->select('users.*','roles.name')->count();
    $pasien = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->where('name','=','pasien')->select('users.*','roles.name')->count();
    $admin = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->where('name','=','admin')->select('users.*','roles.name')->count();
    $obat = DB::table('obat')->count();
    $penyakit = DB::table('penyakit')->count();
    return view ('admin2.home',compact('penyakit','dokter','pasien','obat'));
  }
}