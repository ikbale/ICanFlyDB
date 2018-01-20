<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class appareil extends Model
{
    protected $table = 'appareil';
	protected $fillable = ['num_imm','type_appareil'];

	protected $dates = ['created_at',
	 'updated_at'];
}
