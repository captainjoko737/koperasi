<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MSimpananPokok extends Model
{
    protected $table = 'simpanan_pokok';
	protected $primaryKey = 'id';
	protected $fillable = ['id_user', 'jumlah', 'tanggal'];

}
