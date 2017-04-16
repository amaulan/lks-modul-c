@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form enctype="multipart/form-data" class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama Lengkap</label>

                            <div class="col-md-6">
                                <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="username" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="textt" class="form-control" name="username" value="{{ old('username') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                                   <div class="form-group">
                            <label for="" class="col-md-4 control-label">Jenis Kelamin</label>

                            <div class="col-md-6">
                                <input id="jenis_kelamin" type="radio"  name="jenis_kelamin" value="L" required> Laki - Laki

                                <input id="jenis_kelamin" type="radio"  name="jenis_kelamin" value="P" required> Perempuan

                            </div>
                        </div>          

                         <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Kontingen</label>

                            <div class="col-md-6">
                                <select class="form-control" name="id_kontingen" id="">
                                    @php
                                        $kontingen = App\Kontingen::all();
                                    @endphp

                                    @foreach($kontingen as $kon)
                                        <option value="{{ $kon->id_kontingen }}">{{ $kon->nama_kontingen }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>           


                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Tempat Lahir</label>

                            <div class="col-md-6">
                                <input id="" type="text" class="form-control" name="tempat_lahir" required>
                            </div>
                        </div>           

                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Tanggal Lahir</label>

                            <div class="col-md-6">
                                 <input id="" type="date" class="form-control" name="tanggal_lahir" required>
                            </div>
                        </div>           


                        <div class="form-group">
                            <label for="" class="col-md-4 control-label">Foto Peserta</label>

                            <div class="col-md-6">
                                <input id="" type="file" class="form-control" name="foto" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
