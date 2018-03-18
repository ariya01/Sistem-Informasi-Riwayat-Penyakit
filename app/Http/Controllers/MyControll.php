<?php

namespace App\Http\Controllers;
use Carbon;
use DB;
use Auth;
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
           $user = Auth::user();
           return redirect()->route('home');
    	}
    	else
    	{
        	return "salah";
    	}
    }
    public function home()
    {
    	return view ('admin.home');
    }
    public function akun()
    {
    	$data = DB::table('users')->leftJoin('role_user','users.id','role_user.user_id')->leftJoin('roles','role_id','roles.id')->leftJoin('kelamins','jk','kelamins.id')->select('users.*','role_user.*','roles.name as role','kelamins.JenisKelamin')->get();
    	$role =DB::table('roles')->get();
    	return view('admin.akun',compact('data','role'));
    }
    public function logout()
    {
    	Auth::logout();
    	return redirect('/');
    }
}
