<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable;
use App\User;
use App\Tarea;

class Proveedores extends Authenticable
{

    use Notifiable;

    protected $guard = 'proveedor';
      /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
      protected $fillable = [
        'email', 'password',
    ];
     /**
      * The attributes that should be hidden for arrays.
      *
      * @var array
      */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function hospital(){
        return $this->belongsTo('App\User', 'hospital_id');
    }
    public function sensores(){
        return $this->hasMany(Sensores::Class);
    }
    public function tarea(){
        return $this->hasMany(Tarea::class);
    }

}
