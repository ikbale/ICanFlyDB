<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class personne extends Model
{
    protected $table = 'personne';
	protected $fillable = ['num_ss','nom','prenom','adresse'];

	protected $dates = ['created_at',
	 'updated_at'];
}
