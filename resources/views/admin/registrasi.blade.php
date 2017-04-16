@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('notification')
			<div class="panel panel-default">
				<div class="panel-heading">Daftar Peserta Belum Registrasi
				</div>
				<div class="panel-body">
					<div class="btn btn-success" data-toggle="modal" data-target="#modal-add">Registrasi Peserta</div>
					<br><br>
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Peserta</th>
								<th>Kontingen</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data['peserta']['belum'] as $key => $peserta)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{  $peserta->nama_lengkap }}</td>
								<td>
									{{ $peserta->kontingen->nama_kontingen }}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Daftar Peserta Sudah Registrasi
				</div>
				<div class="panel-body">
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Peserta</th>
								<th>Bidang Lomba</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data['peserta']['sudah'] as $key => $peserta)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ @$peserta->peserta->nama_lengkap }}</td>
								<td>
									@php
										$bidang = App\BidangLomba::find($peserta->id_bidang_lomba);
									@endphp
									{{ @$bidang->nama_bidang_lomba }}
								</td>
								<td>
									<a class="btn btn-danger" href="{{ url('admin/registrasi/delete/'.$peserta->peserta->id_peserta) }}">Hapus</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>



	<div role="dialog" id="modal-add" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="POST" class="form-horizontal" action="{{ url('admin/registrasi/create') }}" role="form">
					{{ csrf_field() }}
					<div class="modal-header">
						<div class="modal-title">Tambah</div>
					</div>
					<div class="modal-body">
							<div class="form-group">
								<label class="col-md-4 control-label" for="">Nama Lomba</label>
								<div class="col-md-6">
									<select class="form-control" name="id_bidang_lomba" id="">
										@php
											$bidang_lomba = App\BidangLomba::all();
										@endphp

										@foreach($bidang_lomba as $bidang)
											<option value="{{ $bidang->id_bidang_lomba }}">{{ $bidang->nama_bidang_lomba }}</option>
										@endforeach
									</select>
								</div>
								<br><br>
							</div>
							<div class="form-group">
								<label for="" class="control-label col-md-4">Peserta</label>
								<div class="col-md-6">
									<select multiple="" class="form-control" name="id_peserta[]" id="">
										@foreach($data['peserta']['belum'] as $belum)
											<option value="{{ $belum->id_peserta }}">{{ $belum->nama_lengkap }}</option>
										@endforeach
									</select>
								</div>
							</div>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-info"> Save </button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
					</form>
				</div>
			</div>
		</div>


@endsection