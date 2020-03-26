<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensores extends Model
{
    public function hospital(){
        return $this->belongsTo('App\User', 'hospital_id');
    }

    public function sensores(){
        return $this->hasMany('App\Datos', 'sensor_id');
    }
}
