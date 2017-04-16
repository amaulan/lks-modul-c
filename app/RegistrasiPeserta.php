<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistrasiPeserta extends Model
{
	protected $table = 'registrasi_peserta';
	protected $fillable = ['id_peserta','id_bidang_lomba','score','keterangan'];
	protected $primaryKey = 'id_peserta';
	public $timestamps = FALSE;
	public $incrementing = FALSE;

	public function peserta()
	{
		return $this->hasOne('App\Peserta','id_peserta');
	}

	public function bidang_lomba()
	{
		return $this->hasOne('App\BidangLomba','id_bidang_lomba');
	}
}
