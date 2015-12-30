<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

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
		$this->middleware('guest', ['except' => ['getLogout','getRegister','postRegister']]);
	}


	public function getRegister()
	{
		return view('auth.register');
	}
	/**
	 * Recibe los datos de registro de un nuevo usuario
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function postRegister(Request $request)
	{
		$validator = $this->registrar->validator($request->all());
		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}
		$this->registrar->create($request->all());
		Flash::success('Cuenta ingresado con exito');
		return redirect($this->redirectPath());
	}

	/**
	 * Funcion que retorna la vista para hacer login
	 * @return \Illuminate\View\View
	 */
	public function getLogin(){
		return view('auth.login');
	}

	/**
	 * Funcion que comprueba las credenciales ingresadas por el usuario
	 * @param Request $request
	 * @return $this|\Illuminate\Http\RedirectResponse
	 */
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
	 * Cierra sesión de usuario
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout()
	{
		$this->auth->logout();
		return redirect('/');
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
