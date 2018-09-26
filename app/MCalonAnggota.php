<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MCalonAnggota extends Model
{
	protected $table="calon_anggota";
	protected $primaryKey="id";
	protected $fillable=['nama','ttl','jenis_kelamin','alamat','telepon','email'];
    //
}
