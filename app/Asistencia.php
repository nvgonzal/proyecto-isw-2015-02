<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model {

	protected $table = 'asistencia';

    public function empleado(){
        return $this->belongsTo('app/Empleado','rut_empleado');
    }

}
