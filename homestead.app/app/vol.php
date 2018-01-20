<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vol extends Model
{
    
    protected $table = 'vol';
    protected $fillable = ['num_vol','date_dep','date_arr','horaire_dep','horaire_arr',
    'nb_place_libre','nb_place_occ','num_imm','nom_aeroport_dep','nom_aeroport_arr','code_aeroport_dep','code_aeroport_arr'];

    protected $dates = ['created_at',
     'updated_at'];

     public function appareil()
    {
        return $this->belongsTo('App\appareil');
    }

     public function aeroport_arr()
    {
        return $this->belongsTo('App\aeroport');
    }

    public function aeroport_dep()
    {
        return $this->belongsTo('App\aeroport');
    }

     public function pilote()
    {
        return $this->hasMany('App\pilote');
    }

     public function equipage_member()
    {
        return $this->hasMany('App\equipage_member');
    }
     
}
