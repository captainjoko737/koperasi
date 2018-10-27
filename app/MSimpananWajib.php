<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MSimpananWajib extends Model
{
    protected $table = 'simpanan_wajib';
	protected $primaryKey = 'id';
	protected $fillable = ['id_user', 'jumlah', 'tanggal'];
}
