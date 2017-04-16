<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
	protected $table = 'peserta';
	protected $fillable = ['nama_lengkap','jenis_kelamin','id_kontingen','tempat_lahir','tanggal_lahir','foto','id_user'];
	protected $primaryKey = 'id_peserta';
	public $timestamps = FALSE;

	public function kontingen()
	{
		return $this->hasOne('App\Kontingen','id_kontingen');
	}

	public function user()
	{
		return $this->hasOne('App\User','id_user');
	}
}
