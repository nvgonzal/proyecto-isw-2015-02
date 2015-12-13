<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Empleado;

use Illuminate\Http\Request;

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
		$empleado = new Empleado();
		dd($request);
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
		$empleado->setAttribute('sueldo_base',$request->input('suledo_base'));
		$empleado->setAttribute('id_afp',$request->input('afp'));
		$empleado->setAttribute('id_aseguradora',$request->input('salud'));
		$empleado->setAttribute('cuenta_bancaria',$request->input('cuenta_bancaria'));
		$now = date('Y-m-d H:i:s');
		$empleado->setAttribute('created_at',$now);
		$empleado->setAttribute('updated_at',$now);
		$empleado->save();
		return view('empleados.createexito');
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
		//
		$empleado = Empleado::find($id);
		return view('empleados.edit')->with('empleado',$empleado);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
