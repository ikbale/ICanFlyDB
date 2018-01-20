<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employe extends Model
{

	protected $table = 'employes';
	protected $fillable = ['id','salaire','num_ss','type'];
    
    protected $dates = ['created_at',
	 'updated_at'];
	 
    public function personne()
    {
        return $this->hasMany('App\personne');
    }

}
