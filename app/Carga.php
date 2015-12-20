<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carga extends Model {

    use SoftDeletes;

	protected $table = 'cargas';

    protected $primaryKey = 'rut';

    protected $incrementing = false;

    protected $dates = ['deleted_at'];

    public function empleado(){
        return $this->belongsTo('app/Empleado','rut_empleado');
    }
}
