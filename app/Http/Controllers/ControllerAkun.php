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

class ControllerAkun extends Controller
{
  public function home()
 	{
    	$dokter = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->where('name','=','dokter')->select('users.*','roles.name')->count();
    	$pasien = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->where('name','=','pasien')->select('users.*','roles.name')->count();
    	$admin = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->where('name','=','admin')->select('users.*','roles.name')->count();
    	$obat = DB::table('obat')->count();
    	$rs = DB::table('rs')->count();
    	$penyakit = DB::table('penyakit')->count();
  	 	return view ('admin.home',compact('dokter','pasien','admin','penyakit','rs','obat'));
 	}
 	  public function index()
 	  {
 		$data = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->leftJoin('detail','users.id','id_user')->select('users.*','roles.name','detail.id_det')->get();
    	$terakhir = DB::table('users')->orderBy('id', 'desc')->first();
    	$angka= $terakhir->id+1;
    	$role =DB::table('roles')->get();
    	$role1 =DB::table('roles')->get();
    	return view('admin.akun',compact('data','role','role1','angka'));
  	}
  	public function editform($id)
  	{
    	$kelamins =DB::table('roles')->get();
    	$data = User::where('id','=',$id)->first();
    	return view('admin.editakun',compact('kelamins','data','id'));
  	}
  	public function hapusakun(Request $request)
  	{
    	$nama = DB::table('users')->where('id','=',$request->id_user)->first();
    	$User =User::destroy($request->id_user);
    	if($User)
    	{
      	return redirect()->route('akun')->with('message','Berhasil1')->with('data',$nama->name_user);
    	}
    	else
    	{
    	  return redirect()->route('akun')->with('message','Gagal2');
    	}
  	}
  	public function masukkandata(Request $request)
  	{
    if($request->id_user==null)
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
    else
    {
      $sendiri = DB::table('users')->where('id','=',$request->id_user)->first();
      if (User::where('email', '=', $request->email)->exists() && $sendiri->email!=$request->email)
      {
        return redirect()->route('akun')->with('message','Gagal');
      }
      else
      {
        $data = User::find($request->id_user);
        $data->name_user = $request->nama;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        $role = Rolenya::where('user_id','=',$request->id_user)->firstOrFail()->delete();
        $role = new Rolenya;
        $role->user_id = $request->id_user;
        $role->role_id = $request->role;
        if($data->save() && $role->save())
        {
         return redirect()->route('akun')->with('message','Berhasil2')->with('data',$request->nama);
        }
      }
    }
  }
}
