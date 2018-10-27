<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAplikasiPinjaman extends Model
{
    protected $table = 'aplikasi_pinjaman';
	protected $primaryKey = 'id';
	protected $fillable = ['id', 'id_user', 'jumlah_diajukan', 'jumlah_disetujui', 'bulan_cicilan_diajukan', 'bulan_cicilan_disetujui', 'status', ];
}
