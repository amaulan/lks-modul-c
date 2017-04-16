<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Kontingen;

use Redirect;
use Session;
use Auth;

class KontingenController extends Controller
{
    public function __construct()
	{
	}

	public function index()
	{
		$data['kontingen'] = Kontingen::all();

		return view('admin/kontingen', compact('data'));
	}
	public function create(Request $request)
	{
		$data = $request->all();

		// validasi


		$create = Kontingen::create($data);

		if($create)
		{
			\Session::flash('sc_msg','Berhasil menambah Kontingen');
			return \Redirect::back();
		}
		else{
			\Session::flash('err_msg','Gagal menambah Kontingen');
			return \Redirect::back();
		}
	}

	public function update(Request $request)
	{
		$data = $request->all();

		$update = Kontingen::find($data['id_kontingen'])->update($data);

		if($update)
		{
			\Session::flash('sc_msg','Berhasil mengupdate Bidang Kontingen');
			return Redirect::back();
		}
		else
		{
			\Session::flash('err_msg','Gagal mengupdate Bidang Kontingen');
			return Redirect::back();
		}
	}
	public function delete($id)
	{
		$delete = Kontingen::find($id)->delete();

		if($delete)
		{
			\Session::flash('sc_msg','Berhasil menghapus Kontingen');
			return Redirect::back();
		}
		else
		{
			\Session::flash('err_msg','Gagal menghapus Kontingen');
			return Redirect::back();
		}
	}
}
