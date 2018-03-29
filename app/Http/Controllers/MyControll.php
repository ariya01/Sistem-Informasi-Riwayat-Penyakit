<?php

namespace App\Http\Controllers;
use Carbon;
use DB;
use Auth;
use App\Detail;
use App\User;
use App\Rolenya;
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
   return view ('admin.home');
 }
 public function akun()
 {

    $data = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->select('users.*','roles.name')->get();
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
    $hasil = User::where('id','=',$data)->first();
    return json_encode($hasil->name_user);   
  }
}
