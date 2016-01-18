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

//Ruta para mostrar pagina principal
Route::get('home','HomeController@index');

//Ruta para mostrar formulario de login
Route::get('/','Auth\AuthController@getLogin');

// Muestra el formulario para el registro de un usuario
Route::get('auth/register', 'Auth\AuthController@getRegister');

// Recibe los datos del formulario de registro de usuarios
Route::post('auth/register',[
    'uses' =>'Auth\AuthController@postRegister',
    'as' => 'auth.register.post'
]);

// Muestra el formulario para iniciar sesion
Route::get('auth/login', 'Auth\AuthController@getLogin');

// Recibe los datos para iniciar sesion
Route::post('auth/login', [
    'uses'=>'Auth\AuthController@postLogin',
    'as' => 'auth.login.post'
]);

// Ruta para cerrar sesi�n de usuario
Route::get('auth/logout', 'Auth\AuthController@getLogout');

//Ruta para formulario de reseteo de contraseña
Route::get('reset/form', 'Auth\PasswordController@getEmail');

//Ruta para enviar formulario de reseteo contraseña
Route::post('password/email',[
    'uses' => 'Auth\PasswordController@postEmail',
    'as' => 'password.email'
]);

//Ruta para obetener los empleados desvinculados
Route::get('empleados/desvinculados',[
    'uses' => 'EmpleadoController@indexDesvinculados',
    'as' => 'empleados.indexDesvincualdos'
]);

Route::get('empleados/{rut}/restore',[
    'uses' => 'EmpleadoController@restaurar',
    'as' => 'empleados.restaurar'
]);

//Ruta para crud de gestion de empelados
Route::resource('empleados','EmpleadoController');

//Ruta para eliminar empleado
Route::get('empleados/{rut}/delete',[
    'uses' => 'EmpleadoController@destroy',
    'as' => 'empleados.destroy'
]);

//Ruta para crud de gestion isapres
Route::resource('isapres','IsapreController');

//Ruta para crud de gestion de afps
Route::resource('afp','AfpController');

//Ruta para eliminar AFP
Route::get('afp/{id}/delete',[
    'uses' => 'AfpController@destroy',
    'as' => 'afp.destroy'
]);


//Rutas para manejar rutas fuera de
Route::any('{all}', function(){
    return view('errors.404');
})->where('all', '.*');