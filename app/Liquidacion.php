<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Liquidacion extends Model {

	protected $table = 'liquidaciones';

    protected $dates = ['fecha_emision'];

    public function empleado(){
        return $this->belongsTo('app/Empleado','rut_empleado','rut');
    }

}
