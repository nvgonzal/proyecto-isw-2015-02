<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Liquidacion extends Model {

	protected $table = 'liquidaciones';

    public function empleado(){
        return $this->belongsTo('app/Empleado','rut_empleado');
    }

}
