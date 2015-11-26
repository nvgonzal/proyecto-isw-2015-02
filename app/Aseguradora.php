<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Aseguradora extends Model {

    protected $table = 'salud';

    public function Empleados(){
        return $this->hasMany('app/Empleado');
    }

}
