<?php namespace App\Services;

use App\Cuenta;
use App\Empleado;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'rut' => 'required|max:12|min:11',
			'password' => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return Cuenta
	 */
	public function create(array $data)
	{
		$cuenta= new Cuenta();
		$cuenta->setAttribute('rut',$data['rut']);
		$cuenta->setAttribute('password',bcrypt($data['password']));
		$cuenta->save();
		$empleado=Empleado::find($data['rut']);
		$empleado->setAttribute('id_cuenta',$cuenta->id);
		$empleado->save();
		return $cuenta;
	}

}
