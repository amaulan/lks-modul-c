<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\BidangLomba;

use Redirect;
use Session;
use Auth;

class BidangLombaController extends Controller
{

	public function index()
	{
		$data['lomba'] = BidangLomba::all();

		return view('admin/lomba', compact('data'));
	}
	public function create(Request $request)
	{
		$data = $request->all();

		// validasi


		$create = BidangLomba::create($data);

		if($create)
		{
			\Session::flash('sc_msg','Berhasil menambah Bidang Lomba');
			return \Redirect::back();
		}
		else{
			\Session::flash('err_msg','Gagal menambah Bidang Lomba');
			return \Redirect::back();
		}
	}

	public function update(Request $request)
	{
		$data = $request->all();

		$update = BidangLomba::find($data['id_bidang_lomba'])->update($data);

		if($update)
		{
			\Session::flash('sc_msg','Berhasil mengupdate Bidang Lomba');
			return Redirect::back();
		}
		else
		{
			\Session::flash('err_msg','Gagal mengupdate Bidang Lomba');
			return Redirect::back();
		}
	}
	public function delete($id)
	{
		$delete = BidangLomba::find($id)->delete();

		if($delete)
		{
			\Session::flash('sc_msg','Berhasil menghapus Bidang Lomba');
			return Redirect::back();
		}
		else
		{
			\Session::flash('err_msg','Gagal menghapus Bidang Lomba');
			return Redirect::back();
		}
	}
}
