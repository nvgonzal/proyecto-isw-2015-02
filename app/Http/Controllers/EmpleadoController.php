<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Empleado;

use Freshwork\ChileanBundle\Facades\Rut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class EmpleadoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$empleados = Empleado::paginate(20);

		return view('empleados.index')->with('empleados',$empleados);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('empleados.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = [
			'rut' => $request->input('rut'),
			'nombres' => $request->input('nombres'),
			'apellido_paterno' => $request->input('apellido_paterno'),
			'apellido_materno' => $request->input('apellido_materno'),
			'f_nacimiento' => $request->input('f_nacimiento'),
			'f_incorporacion' => $request->input('f_incorporacion'),
			'cargo' => $request->input('cargo'),
			'titulo' => $request->input('titulo'),
			'telefono' => $request->input('telefono'),
			'email' => $request->input('email'),
			'domicilio' => $request->input('sueldo_base'),
			'id_afp' => $request->input('id_afp'),
			'id_aseguradora' => $request->input('id_aseguradora'),
			'cuenta_bancaria' => $request->input('cuenta_bancaria'),
		];
		$rules = [
			'rut' => 'required|unique:empleados',
			'nombres' => 'required',
			'apellido_paterno' => 'required',
			'apellido_materno' => 'required',
			'f_nacimiento' => 'required|date',
			'f_incorporacion' => 'required|date',
			'cargo' => 'required',
			'titulo' => 'required',
			'telefono' => 'required',
			'email' => 'required|email',
			'domicilio' => 'required',
			'id_afp' => 'required|exists:afps,id',
			'id_aseguradora' => '',
			'cuenta_bancaria' => 'required',

		];
		$validacion = Validator::make($input,$rules);
		if($validacion->fails()){
			return redirect()->to('empleados/create')->withInput()->withErrors($validacion->messages());
		}
		$empleado = new Empleado();
		$empleado->setAttribute('rut',$request->input('rut'));
		$empleado->setAttribute('nombres',$request->input('nombres'));
		$empleado->setAttribute('apellido_paterno',$request->input('apellido_paterno'));
		$empleado->setAttribute('apellido_materno',$request->input('apellido_materno'));
		$empleado->setAttribute('f_nacimiento',$request->input('f_nacimiento'));
		$empleado->setAttribute('f_incorporacion',$request->input('f_incorporacion'));
		$empleado->setAttribute('cargo',$request->input('cargo'));
		$empleado->setAttribute('titulo',$request->input('titulo'));
		$empleado->setAttribute('telefono',$request->input('telefono'));
		$empleado->setAttribute('domicilio',$request->input('domicilio'));
		$empleado->setAttribute('email',$request->input('email'));
		$empleado->setAttribute('sueldo_base',$request->input('sueldo_base'));
		$empleado->setAttribute('id_afp',$request->input('id_afp'));
		$empleado->setAttribute('id_aseguradora',$request->input('id_salud'));
		$empleado->setAttribute('cuenta_bancaria',$request->input('cuenta_bancaria'));
		$now = date('Y-m-d H:i:s');
		$empleado->setAttribute('created_at',$now);
		$empleado->setAttribute('updated_at',$now);
		$empleado->save();
		Flash::success('Empleado ingresado con exito');
		return redirect('empleados');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $rut
	 * @return Response
	 */
	public function show($rut)
	{
		//
		$empleado = Empleado::find($rut);
		return view('empleados.show')->with('empleado',$empleado);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$empleado = Empleado::find($id);
		return view('empleados.edit')->with('empleado',$empleado);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param Request $request
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$empleado = Empleado::find($id);
		$empleado->delete();
	}

}
