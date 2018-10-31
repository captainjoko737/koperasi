<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MPinjaman extends Model
{
    protected $table = 'pinjaman';
	protected $primaryKey = 'id';
	protected $fillable = ['id_user', 'jumlah_pinjaman', 'tenor', 'angsuran_ke'];
}
