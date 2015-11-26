<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Carga extends Model {

	protected $table = 'cargas';

    public function empleado(){
        return $this->belongsTo('app/Empleado','rut_empleado');
    }
}
