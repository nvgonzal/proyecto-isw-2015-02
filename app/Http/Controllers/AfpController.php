<?php namespace App\Http\Controllers;

use App\AFP;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AfpController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$AFPs = AFP::paginate(10);
		return view('afp.index')->with('AFPs',$AFPs);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('afp.create');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $rut
	 * @param Request $request
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
			return redirect()->to('afp/'.$rut.'/edit')->withInput()->withErrors($validacion->messages());
		}
		$AFP = AFP::find($rut);
		$AFP->setAttribute('rut',$request->input('rut'));
		$AFP->setAttribute('nombre',$request->input('nombre'));
		$AFP->setAttribute('email',$request->input('email'));
		$AFP->setAttribute('telefono',$request->input('telefono'));
		$AFP->setAttribute('link',$request->input('link'));
		$exito=$AFP->save();

		if ($exito) {
			Flash::success('afp actualizado');
			return redirect('afp');
		} else {
			Flash::error('afp no puedo ser actualizado');
			return redirect('afp');
		}
	}

	/**
	 * Store a newly created resource in storage.
	 * @param Request $request
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
			return redirect()->to('afp/create')->withInput()->withErrors($validacion->messages());
		}
		$AFP = new AFP();
		$AFP->setAttribute('nombre',$request->input('nombre'));
		$AFP->setAttribute('email',$request->input('email'));
		$AFP->setAttribute('telefono',$request->input('telefono'));
		$AFP->setAttribute('link',$request->input('link'));
		$exito=$AFP->save();

		if ($exito) {
			Flash::success('afp ingresada con exito');
			return redirect('afp');
		} else {
			Flash::error('afp no puedo ser ingresada');
			return redirect('afp');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $rut
	 * @return Response
	 */
	public function show($rut)
	{
		$AFP = AFP::find($rut);
		return view('afp.show')->with('afp',$AFP);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $rut
	 * @return Response
	 */
	public function edit($rut)
	{
		$AFP = AFP::find($rut);
		return view('afp.edit')->with('afp',$AFP);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $rut
	 * @return Response
	 */
	public function destroy($rut)
	{
		$AFP = AFP::find($rut);
		$exito=$AFP->delete();
		if($exito){
			Flash::success('afp eliminada con exito');
			return redirect('afp');
		}
		else{
			Flash::error('afp no pudo ser eliminada');
			return redirect('afp');
		}
	}

}
