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
			'rut' => 'required|max:12',
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
		return Cuenta::create([
			'rut' => $data['rut'],
			'password' => bcrypt($data['password']),
		]);
	}

}
