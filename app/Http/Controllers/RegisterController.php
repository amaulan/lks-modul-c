<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Session;
use Redirect;
use File;

class RegisterController extends Controller
{
	public function register(Request $request)
	{
		// validasi terlebih dahulu
		$validasi = \Validator::make($request->all(),[
			'username' => 'required|unique:users'
		]);

		if($validasi->fails())
		{
			\Session::flash('err_msg',$validasi->errors()->all());
			return \Redirect::back();
		}

		if($request->hasFile('foto'))
		{	
			$image    = $request->file('foto');
			$filename = date('ymdhis');
			$format   = $image->getClientOriginalExtension();
			$filename = $filename.'.'.$format;
			$request->file('foto')->move(public_path('upload/'),$filename.'.'.$format);
		}

		$data_peserta = $request->all();
		$data_peserta['password'] 	= bcrypt($request->password); 
		$user =\App\User::create($data_peserta);

		$data_peserta['id_user'] 	= $user->id;
		$data_peserta['foto'] 	 	= $filename;
		$peserta = \App\Peserta::create($data_peserta);

		$login = User::join('peserta','users.id_user','=','peserta.id_user','left')
						 ->where('username',$data_peserta['username'])
						 ->first();
						 
		Session::put('credential',$login);

		return \Redirect::to('user');
	}
}
