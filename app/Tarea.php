<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    public function proveedor(){
        return $this->belongsTo(Proveedores::Class, 'proveedor_id');
    }

    
}
