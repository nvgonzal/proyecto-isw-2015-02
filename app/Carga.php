<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carga extends Model {

	protected $table = 'cargas';

    protected $primaryKey = 'rut';

    public $incrementing = false;

    public function empleado(){
        return $this->belongsTo('app/Empleado','rut_empleado');
    }
}
