<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
    public function sensores(){
        return $this->belongsTo('App\Sensores', 'sensor_id');
    }
}
