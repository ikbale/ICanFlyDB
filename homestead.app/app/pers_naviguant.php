<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pers_naviguant extends Model
{
     public function employe()
    {
        return $this->belongsTo('App\employe');
    }
}
