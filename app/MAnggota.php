<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAnggota extends Model
{
	
	protected $table = 'anggota';
	protected $primaryKey = 'id';
	protected $fillable = ['id', 'nama', 'ttl', 'jenis_kelamin', 'alamat', 'telepon', 'email', 'status', 'json_data'];

}
