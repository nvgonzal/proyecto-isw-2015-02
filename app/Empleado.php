<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model {

	protected $table = 'empleados';

    public function AFP(){
        return $this->belongsTo('app/AFP','id_afp');
    }

    public function Aseguradora(){
        return $this->belongsTo('app/Aseguradora','id_aseguradora');
    }

    public function cuenta(){
        return $this->hasOne('app/Cuenta','id_cuenta');
    }

    public function cargas(){
        return $this->hasMany('app/Cuenta');
    }

    public function liquidaciones(){
        return $this->hasMany('app/Liquidacion');
    }

    public function asistencias(){
        return $this->hasMany('app/Liquidacion');
    }
}
