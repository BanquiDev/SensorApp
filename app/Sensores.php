<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sensores;
use App\User;

class Sensores extends Model
{
    public function hospital(){
        return $this->belongsTo(User::class, 'hospital_id');
    }

    public function datos(){
        return $this->hasMany(Datos::class, 'sensor_id');
    }
    public function proveedor(){
        return $this->belongsTo(Proveedores::class, 'proveedor_id');
    }
}
