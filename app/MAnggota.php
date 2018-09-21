<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MAnggota extends Model
{
	protected $table="anggota";
	protected $primaryKey="id";
	protected $fillable=['nama','TTL','jenis_kelamin','alamat','telepon','email','status'];
    //
}
