@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('notification')
			<div class="panel panel-default">
				<div class="panel-heading">Penilaian</div>
				<div class="panel-body">
					<br><br>
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Peserta</th>
								<th>Bidang Lomba</th>
								<th>Nilai</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data['peserta'] as $key => $peserta)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $peserta->peserta->nama_lengkap }}</td>
								<td>
									@php
										$bidang = App\BidangLomba::find($peserta->id_bidang_lomba);
									@endphp
									{{ $bidang->nama_bidang_lomba }}
								</td>
								<td>{{ $peserta->score }}</td>
								<td>
									<button data-toggle="modal" data-target="#modal-{{ $key+1 }}" class="btn btn-info btn-xs"> Edit </button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>



	@foreach($data['peserta'] as $key => $value)
		<div role="dialog" id="modal-{{ $key+1 }}" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="POST" class="form-horizontal" action="{{ url('admin/penilaian/update') }}" role="form">
					{{ csrf_field() }}
					<div class="modal-header">
						<div class="modal-title">Edit</div>
					</div>
					<div class="modal-body">
							<input type="hidden" value="{{ $value->id_peserta }}" name="id_peserta">
							<div class="form-group">
								<label class="col-md-4 control-label" for="">Nilai</label>
								<div class="col-md-6">
									<select class="form-control" name="score" id="">
										@for($i=1;$i<=100;$i++)
											<option value="{{ $i }}">{{ $i }}</option>
										@endfor
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for="">Keterangan</label>
								<div class="col-md-6">
									<select class="form-control" name="keterangan" id="">
										<option value="1">Emas</option>
										<option value="2">Perak</option>
										<option value="3">Perunggu</option>
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
	@endforeach

@endsection