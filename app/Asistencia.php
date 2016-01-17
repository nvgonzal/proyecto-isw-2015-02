<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asistencia extends Model {

    use SoftDeletes;

	protected $table = 'asistencia';

    protected $dates = ['deleted_at'];

    public function empleado(){
        return $this->belongsTo('app/Empleado','rut_empleado','rut');
    }

}
