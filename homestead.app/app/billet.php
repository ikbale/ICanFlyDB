<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class billet extends Model
{

   
	protected $table = 'billet';
	protected $fillable = ['num_billet','prix','date_emission','num_vol','num_ss'];


	protected $dates = ['created_at',
	 'updated_at'];

    public function vol()
    {
        return $this->belongsTo('vol::class');
    }

    public function personne()
    {
        return $this->belongsTo('App\personne');
    }

    
}



