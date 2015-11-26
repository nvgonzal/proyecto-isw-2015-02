<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class AFP extends Model {

    protected $table = 'afps';

    public function empleados(){
        return $this->hasMany('app/Empleado');
    }

}
