<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model {

    use SoftDeletes;

    public $incrementing = false;

	protected $table = 'empleados';

    protected $primaryKey = 'rut';

    protected $dates = ['deleted_at','created_at',
        'updated_at','f_nacimiento','f_incorporacion'];

    public function AFP(){
        return $this->belongsTo('App\AFP','id_afp');
    }

    public function aseguradora(){
        return $this->belongsTo('App\Aseguradora','id_aseguradora');
    }

    public function cuenta(){
        return $this->hasOne('App\Cuenta','rut','rut');
    }

    public function cargas(){
        return $this->hasMany('App\Carga','rut_empleado','rut');
    }

    public function liquidaciones(){
        return $this->hasMany('App\Liquidacion','rut_empleado','rut');
    }

    public function asistencias(){
        return $this->hasMany('App\Asistencia','rut_empleado','rut');
    }
}
