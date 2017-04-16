<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidangLomba extends Model
{
	protected $table = 'bidang_lomba';
	protected $fillable = ['nama_bidang_lomba'];
	protected $primaryKey = 'id_bidang_lomba';
	public $timestamps = FALSE;
}
