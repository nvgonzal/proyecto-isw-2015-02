<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('home','HomeController@index');

Route::get('/','Auth\AuthController@getLogin');

Route::get('auth/register', 'Auth\AuthController@getRegister'); // Muestra el formulario para el registro de un usuario

Route::post('auth/register',[
    'uses' =>'Auth\AuthController@postRegister',
    'as' => 'auth.register.post'
]); // Recibe los datos del formulario de registro de usuarios

Route::get('auth/login', 'Auth\AuthController@getLogin'); // Muestra el formulario para iniciar sesión

Route::post('auth/login', [
    'uses'=>'Auth\AuthController@postLogin',
    'as' => 'auth.login.post'
]); // Recibe los datos para iniciar sesión
Route::get('auth/logout', 'Auth\AuthController@getLogout'); // Ruta para cerrar sesión de usuario

Route::resource('empleados','EmpleadoController');

Route::get('empleados/{rut}/delete',[
    'uses' => 'EmpleadoController@destroy',
    'as' => 'empleados.destroy'
]);

Route::resource('isapre','IsapreController');

Route::resource('afp','AfpController');

Route::any('{all}', function(){
    return view('errors.404');
})->where('all', '.*');