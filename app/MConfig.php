<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MConfig extends Model
{
    protected $table = 'config';
	protected $primaryKey = 'id';
	protected $fillable = ['key', 'value'];
}
