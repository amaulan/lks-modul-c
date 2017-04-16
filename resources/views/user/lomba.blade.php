@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-10 col-md-offset-1">
        
        <div class="panel panel-default">
            <div class="panel-heading">Daftar Lomba</div>
            <div class="panel-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Bidang Lomba</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@php
                    		$check  = \App\RegistrasiPeserta::where('id_peserta',Session::get('credential')->id_peserta)->first();
                    	@endphp

                    	@if(count($check))
							@php
								$bidang_l = \App\BidangLomba::find($check->id_bidang_lomba);
							@endphp
							<tr>
								<td>{{ $bidang_l->nama_bidang_lomba }}</td>
								<td><a href="{{ url('user/lomba/batal/'.$check->id_peserta) }}" class="btn btn-danger">Batal</a></td>
							</tr>
                    	@else
	                    	@foreach($data['bidang'] as $bid)
								<tr>
									<td>{{ $bid->nama_bidang_lomba }}</td>
									<th><a href="{{ url('user/lomba/daftar/'.$bid->id_bidang_lomba) }}" class="btn btn-info">Daftar</a></th>
								</tr>
	                    	@endforeach
	                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection