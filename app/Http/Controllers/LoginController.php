<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use Redirect;
use Session;

use App\User;

class LoginController extends Controller
{
	public function login(Request $request)
	{
		$data = $request->all();

		$login = User::where('username',$data['username'])->first();

		if(count($login))
		{

			if(Hash::check($data['password'],$login->password))
			{
				$login = User::join('peserta','users.id_user','=','peserta.id_user','left')
						 ->where('username',$data['username'])
						 ->first();
						 
				Session::put('credential',$login);
				if($login->level == 1)
					return Redirect::to('admin');

				if($login->level == 0)
					return Redirect::to('user');
			}
			else
			{
				return Redirect::back()->with('err_msg','Password Tidak Benar');
			}
		}

		return Redirect::back()->with('err_msg','Username Tidak Ditemukan');
	}
}
