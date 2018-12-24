<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MSimpananSukarela extends Model
{
    protected $table = 'simpanan_sukarela';
	protected $primaryKey = 'id';
	protected $fillable = ['id_user', 'jumlah', 'tanggal'];
}
