<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use Redirect;

class BidangLombaController extends Controller
{
    public function index()
    {
    	// return Session::get('credential');
        $data['bidang'] = \App\BidangLomba::all();
    	return view('user/lomba', compact('data'));
    }

    public function daftar($id)
    {
        $data = Session::get('credential');

        \App\RegistrasiPeserta::create([
            'id_peserta' => $data->id_peserta,
            'id_bidang_lomba' => $id,
            'score' => 0,
            'keterangan' => 0
        ]);

        return Redirect::back()->with('sc_msg','Berhasil Mendaftar');

    }

    public function batal($id)
    {
    	// $id = Session::get('credential')->peserta_id;
        \App\RegistrasiPeserta::find($id)->delete();

        return Redirect::back()->with('sc_msg','Berhasil Membatalkan');

    }
}
