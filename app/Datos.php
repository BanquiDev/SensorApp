<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sensores;
use App\User;

class Datos extends Model
{
    public function sensores(){
        return $this->belongsTo(Sensores::class, 'sensor_id');

    }
    public function hospitales(){
        return $this->belongsTo(User::class, 'hospital_id');

    }
}
