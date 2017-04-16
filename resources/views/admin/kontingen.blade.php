@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@include('notification')
			<div class="panel panel-default">
				<div class="panel-heading">Daftar Kontingen</div>
				<div class="panel-body">
					<div class="btn btn-success" data-toggle="modal" data-target="#modal-add">Tambah Data</div>
					<br><br>
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Kontingen</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data['kontingen'] as $key => $kontingen)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{  $kontingen->nama_kontingen }}</td>
								<td>
									<button data-toggle="modal" data-target="#modal-{{ $key+1 }}" class="btn btn-info btn-xs"> Edit </button>
									<a href="{{ url('admin/kontingen/delete/'.$kontingen->id_kontingen) }}" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ?')"> Delete </a>
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
					<form method="POST" class="form-horizontal" action="{{ url('admin/kontingen/create') }}" role="form">
					{{ csrf_field() }}
					<div class="modal-header">
						<div class="modal-title">Tambah</div>
					</div>
					<div class="modal-body">
							<div class="form-group">
								<label class="col-md-4 control-label" for="">Nama Kontingen</label>
								<div class="col-md-6">
									<input class="form-control" type="text" class="form-control" name="nama_kontingen" >
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

	@foreach($data['kontingen'] as $key => $value)
		<div role="dialog" id="modal-{{ $key+1 }}" class="modal fade">
			<div class="modal-dialog">
				<div class="modal-content">
					<form method="POST" class="form-horizontal" action="{{ url('admin/kontingen/update') }}" role="form">
					{{ csrf_field() }}
					<div class="modal-header">
						<div class="modal-title">Edit</div>
					</div>
					<div class="modal-body">
							<input type="hidden" value="{{ $value->id_kontingen }}" name="id_kontingen">
							<div class="form-group">
								<label class="col-md-2" for="">Nama Kontingen</label>
								<input class="col-md-8" type="text" class="form-control" name="nama_kontingen" value="{{  $value->nama_kontingen }}">
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