<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pilote extends Model
{
     public function pers_naviguant()
    {
        return $this->belongsTo('App\pers_naviguant');
    }

     public function vol()
    {
        return $this->hasMany('App\vol');
    }
}
