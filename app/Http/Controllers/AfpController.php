<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AfpController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$AFP = AFP::paginate(20);
		return view('AFP.index')->with('AFP',$AFP);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('AFP.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = [
			'rut' => $request->input('rut'),
			'nombre' => $request->input('nombre'),
			'email' => $request->input('email'),
			'telefono' => $request->input('telefono'),
			'link' => $request->input('link'),
		];
		$rules = [
			'rut' => 'required|unique:empleados,rut',
			'nombre' => 'required',
			'email' => 'required|email',
			'telefono' => 'required',
			'link' => 'required|url',
		];
		$validacion = Validator::make($input,$rules);
		if($validacion->fails()){
			return redirect()->to('AFP/create')->withInput()->withErrors($validacion->messages());
		}
		$AFP = new AFP();
		$AFP->setAttribute('rut',$request->input('rut'));
		$AFP->setAttribute('nombre',$request->input('nombre'));
		$AFP->setAttribute('email',$request->input('email'));
		$AFP->setAttribute('telefono',$request->input('telefono'));
		$AFP->setAttribute('link',$request->input('link'));
		$exito=$AFP->save();

		if ($exito) {
			Flash::success('AFP ingresada con exito');
			return redirect('AFP');
		} else {
			Flash::error('AFP no puedo ser ingresada');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($rut)
	{
		$AFP = Empleado::find($rut);
		return view('AFP.show')->with('AFP',$AFP);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($rut)
	{
		$AFP = AFP::find($rut);
		return view('AFP.edit')->with('AFP',$AFP);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$rut)
	{
		$input = [
			'rut' => $request->input('rut'),
			'nombre' => $request->input('nombre'),
			'email' => $request->input('email'),
			'telefono' => $request->input('telefono'),
			'link' => $request->input('link'),
		];
		$rules = [
			'rut' => 'required|unique:empleados,rut',
			'nombre' => 'required',
			'email' => 'required|email',
			'telefono' => 'required',
			'link' => 'required|url',
		];
		$validacion = Validator::make($input,$rules);
		if($validacion->fails()){
			return redirect()->to('AFP/'.$rut)->withInput()->withErrors($validacion->messages());
		}
		$AFP = AFP::find($rut);
		$AFP->setAttribute('rut',$request->input('rut'));
		$AFP->setAttribute('nombre',$request->input('nombre'));
		$AFP->setAttribute('email',$request->input('email'));
		$AFP->setAttribute('telefono',$request->input('telefono'));
		$AFP->setAttribute('link',$request->input('link'));
		$exito=$AFP->save();

		if ($exito) {
			Flash::success('AFP actualizado');
			return redirect('AFP');
		} else {
			Flash::error('AFP no puedo ser actualizado');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($rut)
	{
		$AFP = AFP::find($rut);
		$exito=$AFP->delete();
		if($exito){
			Flash::success('AFP eliminada con exito');
			return redirect('AFP');
		}
		else{
			Flash::error('AFP no pudo ser eliminada');
			return redirect('AFP');
		}
	}

}
