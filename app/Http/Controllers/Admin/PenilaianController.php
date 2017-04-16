<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use Redirect;

use App\RegistrasiPeserta;

class PenilaianController extends Controller
{
    public function index()
    {
    	$data['peserta'] = RegistrasiPeserta::with('peserta')->orderBy('id_bidang_lomba')->get();

    	return view('admin.penilaian', compact('data')); 
    }


    public function update(Request $request)
    {
    	$data = $request->all();

    	RegistrasiPeserta::find($data['id_peserta'])->update($data);

    	return Redirect::back()->with('sc_msg','Berhasil Memberikan Nilai');
    }
}
