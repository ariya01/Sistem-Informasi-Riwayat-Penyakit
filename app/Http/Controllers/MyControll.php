<?php

namespace App\Http\Controllers;
use Carbon;
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
    return view ('welcome');
  }
  public function signin(Request $request)
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
        return 'under contruction';
      }
      elseif ($user == 'dokter') 
      {
        return redirect()->route('rumah');
      }
    }
    else
    {
     return view ('error');
   }
 }
 public function home()
 {
    $dokter = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->where('name','=','dokter')->select('users.*','roles.name')->count();
    $pasien = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->where('name','=','pasien')->select('users.*','roles.name')->count();
    $admin = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->where('name','=','admin')->select('users.*','roles.name')->count();

   return view ('admin.home',compact('dokter','pasien','admin'));
 }
 public function akun()
 {

    $data = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->leftJoin('detail','users.id','id_user')->select('users.*','roles.name','detail.id_det')->get();
    // dd($data);
    $role =DB::table('roles')->get();
    $role1 =DB::table('roles')->get();
    return view('admin.akun',compact('data','role','role1'));
  }
  public function logout()
  {
    Auth::logout();
    return redirect('/');
  }
  public function rumah()
  {
    return view('dokter.master');
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
        return redirect()->route('akun')->with('message','Berhasil');
      }
      else
      {
        return redirect()->route('akun')->with('message','Gagal1');
      }
    }
  }
  public function hapusakun(Request $request)
  {
    $User =User::destroy($request->id_user);
    if($User)
    {
      return redirect()->route('akun')->with('message','Berhasil1');
    }
    else
    {
      return redirect()->route('akun')->with('message','Gagal2');
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
       return redirect()->route('akun')->with('message','Berhasil2');
      }
    }
  }
  public function getajax(Request $request,$id)
  {
    $data = $request->id;
    $hasil = Detail::where('id_user','=',$data)->first();
    return json_encode($hasil);   
  }
  public function detail($id)
  {
    $kelamins =DB::table('kelamins')->get();
    $data = Detail::where('id_user','=',$id)->first();
    return view('admin.detail',compact('kelamins','data','id'));
  }
  public function isidetail(Request $request)
  {
    if($request->id) 
    {
      $hasil = Detail::where('id_user','=',$request->id)->
      update(['id_user'=>$request->id_user,'id_jk'=>$request->kel,'alamat'=>$request->alamat,'berat'=>$request->berat,'tinggi'=>$request->tinggi,'tanggal'=>$request->tanggal,'kontak'=>$request->kontak,'status'=>0]);
      if($hasil)
      {
        return redirect()->route('detail',$request->id_user)->with('message','Berhasil');
      }
      else
      {
        return redirect()->route('detail')->with('message','Gagal');
      }
    }
    else
    {
      $data = new Detail;
      $data->id_user = $request->id_user;
      $data->id_jk = $request->kel;
      $data->alamat =$request->alamat;
      $data->berat =$request->berat;
      $data->tinggi =$request->tinggi;
      $data->tanggal = $request->tanggal;
      $data->kontak = $request->kontak;
      $data->status =0;
      if($data->save())
      {
        return redirect()->route('detail',$request->id_user)->with('message','Berhasil');
      }
      else
      {
        return redirect()->route('detail')->with('message','Gagal');
      }
    }
  }
  public function dokter()
  {
    $data = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->where('name','=','dokter')->leftjoin('detail','detail.id_user','users.id')->leftJoin('dokter','users.id','dokter.id_user')->leftJoin('strata','strata.id_strata','dokter.id_strata')->leftjoin('spesialis','spesialis.id_spesialis','dokter.id_spesialis')->where('dokter.status','=',1)->select('users.id','detail.tanggal','users.name_user','strata.nama_strata','spesialis.nama_spesialis','detail.id_det')->get();
    $data1 = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->where('name','=','dokter')->leftjoin('detail','detail.id_user','users.id')->leftJoin('dokter','users.id','dokter.id_user')->leftJoin('strata','strata.id_strata','dokter.id_strata')->leftjoin('spesialis','spesialis.id_spesialis','dokter.id_spesialis')->where('dokter.id_dokter','=',null)->select('users.id','detail.tanggal','users.name_user','strata.nama_strata','spesialis.nama_spesialis','detail.id_det')->get();
    // dd($data1);
    return view('admin.dokter',compact('data','data1'));
  }
  public function dokterdetail($id)
  {
    $data = DB::table('dokter')->where('id_user','=',$id)->leftJoin('strata','strata.id_strata','dokter.id_strata')->leftjoin('spesialis','spesialis.id_spesialis','dokter.id_spesialis')->leftjoin('univ','univ.id_univ','dokter.id_univ')->get();
    // dd($data);
    $personal =User::where('id','=',$id)->first();    
    $detail =Detail::where('id_user','=',$id)->first();
    // dd($data);
    $strata =Db::table('strata')->get();
    $univ = Db::table('univ')->get();
    $spesialis = Db::table('spesialis')->get();
    // dd($strata);
    return view('admin.dokterdetail',compact('spesialis','univ','data','personal','detail','strata'));
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
}