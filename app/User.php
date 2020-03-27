<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [  ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function proveedores(){
        return $this->hasMany(Proveedores::class, 'hospital_id');
    }
    public function sensores(){
        return $this->hasMany(Sensores::class, 'hospital_id');
    }
    public function datos(){
        return $this->hasMany(Datos::class, 'hospital_id');
    }
}
