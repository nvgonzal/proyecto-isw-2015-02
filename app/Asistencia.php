<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asistencia extends Model {

	protected $table = 'asistencia';

    protected $dates = ['fecha'];

    public function empleado(){
        return $this->belongsTo('app/Empleado','rut_empleado','rut');
    }

}
