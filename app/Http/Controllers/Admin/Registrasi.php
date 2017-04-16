<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Peserta;
use App\RegistrasiPeserta;

use Redirect;
use Session;

class Registrasi extends Controller
{
    public function index()
    {
    	$registrasi = RegistrasiPeserta::select('id_peserta')->get();
    	$id_peserta = [];

    	foreach ($registrasi as $key => $value) {
    		$id_peserta[] = $value->id_peserta;
    	}

    	$data['peserta']['belum'] = Peserta::with('kontingen')->whereNotIn('id_peserta',$id_peserta)->get();
    	$data['peserta']['sudah'] = RegistrasiPeserta::with('bidang_lomba','peserta')->get();
        // return $data['peserta']['sudah'][0]->bidang_lomba->nama_bidang_lomba;
        return view('admin/registrasi', compact('data'));
    }

    public function create(Request $request)
    {
        $data = $request->all();
        // return $data['peserta_id'];
        foreach($request['id_peserta'] as $peserta)
        {
            RegistrasiPeserta::create([
                'id_peserta' => $peserta,
                'id_bidang_lomba' => $request->id_bidang_lomba,
                'score' => 0,
                'keterangan' => 0
            ]);
        }

        return Redirect::back()->with('sc_msg','berhasil registrasi');
        // return $request->all();
    }

    public function delete($id)
    {
        RegistrasiPeserta::find($id)->delete();

        return Redirect::back()->with('sc_msg','Berhasil Menghapus');
    }
}
