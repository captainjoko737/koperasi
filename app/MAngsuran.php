<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAngsuran extends Model
{
    protected $table = 'angsuran';
	protected $primaryKey = 'id';
	protected $fillable = ['id_pinjaman', 'angsuran_ke', 'angsuran_bunga', 'angsuran_pokok', 'total_angsuran', 'sisa_pinjaman', 'jumlah', 'denda', 'status'];
}

