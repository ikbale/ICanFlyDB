<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aeroport extends Model
{
    protected $table = 'aeroport';
	protected $fillable = ['nom_aeroport','code_aeroport'];

	protected $dates = ['created_at',
	 'updated_at'];
}
