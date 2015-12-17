<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model {

    use SoftDeletes;

	protected $table = 'empleados';

    protected $primaryKey = 'rut';

    protected $dates = ['deleted_at'];

    public function AFP(){
        return $this->belongsTo('App\AFP','id_afp');
    }

    public function Aseguradora(){
        return $this->belongsTo('App\Aseguradora','id_aseguradora');
    }

    public function cuenta(){
        return $this->hasOne('App\Cuenta','id_cuenta');
    }

    public function cargas(){
        return $this->hasMany('App\Carga');
    }

    public function liquidaciones(){
        return $this->hasMany('App\Liquidacion');
    }

    public function asistencias(){
        return $this->hasMany('App\Asistencia');
    }
}
