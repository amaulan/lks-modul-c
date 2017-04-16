@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">Peraih Medali Setiap Kontinge</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kontingen</th>
                            <th>Medali Emas</th>
                            <th>Medali Perak</th>
                            <th>Medali Perunggu</th>
                            <th>Jumlah Medali</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['overview'] as $key => $val)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $val->nama_kontingen }}</td>
                            <td>
                                @php
                                $emas = DB::select("SELECT * FROM registrasi_peserta JOIN peserta ON registrasi_peserta.id_peserta = peserta.id_peserta JOIN kontingen ON kontingen.id_kontingen = peserta.id_kontingen HAVING kontingen.id_kontingen = $val->id_kontingen AND registrasi_peserta.keterangan = 1");
                                $emas = count($emas);
                                @endphp
                                {{ $emas }}
                            </td>
                            <td>
                                @php
                                $perak = DB::select("SELECT * FROM registrasi_peserta JOIN peserta ON registrasi_peserta.id_peserta = peserta.id_peserta JOIN kontingen ON kontingen.id_kontingen = peserta.id_kontingen HAVING kontingen.id_kontingen = $val->id_kontingen AND registrasi_peserta.keterangan = 2");
                                $perak = count($perak);
                                @endphp
                                {{ $perak }}
                            </td>
                            <td>
                                @php
                                $perunggu = DB::select("SELECT * FROM registrasi_peserta JOIN peserta ON registrasi_peserta.id_peserta = peserta.id_peserta JOIN kontingen ON kontingen.id_kontingen = peserta.id_kontingen HAVING kontingen.id_kontingen = $val->id_kontingen AND registrasi_peserta.keterangan = 3");
                                $perunggu = count($perunggu);
                                @endphp
                                {{ $perunggu }}
                            </td>
                            <td>
                                {{ $emas+$perak+$perunggu }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @foreach($data['bidang'] as $bidang)
    <div class="col-md-10 col-md-offset-1">
        
        <div class="panel panel-default">
            <div class="panel-heading">{{ $bidang->nama_bidang_lomba }}</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Lengkap</th>
                            <th>Kontingen</th>
                            <th>Posisi</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $peserta  = App\RegistrasiPeserta::with('peserta')->where('id_bidang_lomba',$bidang->id_bidang_lomba)->orderBy('score','DESC')->get();
                        @endphp
                        @foreach($peserta as $key => $pes)
                        <tr>
                            <td>{{ $pes->peserta->nama_lengkap }}</td>
                            <td>
                                @php
                                $kontingen = App\Kontingen::find($pes->peserta->id_kontingen)->first();
                                @endphp
                                {{ $kontingen->nama_kontingen }}
                            </td>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $pes->score }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection