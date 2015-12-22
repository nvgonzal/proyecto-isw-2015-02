<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		//Restringe el paso a las funciones del controlador solo a usuarios que no estan logueado
		$this->middleware('guest', ['except' => 'getLogout']);
	}


	public function getLogin(){
		return view('auth.login');
	}

	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'rut' => 'required',
			'password' => 'required',
		]);
		$credentials = $request->only('rut', 'password');
		if ($this->auth->attempt($credentials, $request->has('remember')))
		{
			// Si la autenticación fué correcta:
			return redirect()->intended($this->redirectPath());
		}
		// Si los datos de inicio de sesión fueron incorrectos, se vuelve a mostrar formulario de inicio de sesión junto
		// a los errores
		return redirect($this->loginPath())
			->withInput($request->only('rut', 'remember'))
			->withErrors([
				'rut' => $this->getFailedLoginMessage(),
			]);
	}

	/**
	 * Retorna la ruta para redireccionar luego de:
	 *  - Un registro exitoso de un nuevo usuario
	 *  - Después de un login exitoso
	 * @return string
	 */
	public function redirectPath()
	{
		return '/home';
	}

	/**
	 * Obtiene la ruta para logeo
	 *
	 * @return string
	 */
	public function loginPath()
	{
		return '/auth/login';
	}



}
