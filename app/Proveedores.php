<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    public function hospital(){
        return $this->belongsTo('App\User', 'hospital_id');
    }
}
