<?php namespace App\Http\Controllers;

use App\AFP;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

class AfpController extends Controller {

	public function __construct(){
		$this->middleware('auth');
	}

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
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$AFP = AFP::find($id);
		return view('afp.edit')->with('AFP',$AFP);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$input = [
			'nombre' => $request->input('nombre'),
			'email' => $request->input('email'),
			'telefono' => $request->input('telefono'),
			'link_envio' => $request->input('link_envio'),
		];
		$rules = [
			'nombre' => 'required|max:40',
			'email' => 'email|max:50',
			'telefono' => 'max:35',
			'link_envio' => 'required|max:50',
		];
		$validacion = Validator::make($input,$rules);
		if($validacion->fails()){
			return redirect()->to('afp/'.$id.'/edit')->withInput()->withErrors($validacion->messages());
		}
		$AFP = AFP::find($id);
		$AFP->setAttribute('nombre',$request->input('nombre'));
		$AFP->setAttribute('email',$request->input('email'));
		$AFP->setAttribute('telefono',$request->input('telefono'));
		$AFP->setAttribute('link_envio',$request->input('link_envio'));
		$exito=$AFP->save();

		if ($exito) {
			Flash::success('AFP actualizada');
			return redirect('afp');
		} else {
			Flash::error('AFP no pudo ser actualizado');
			return redirect('afp');
		}
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
			'rut' => 'required|unique:afps,rut|max:14',
			'nombre' => 'required|max:40',
			'email' => 'email|max:50',
			'telefono' => 'max:35',
			'link' => 'required|max:50',
		];
		$validacion = Validator::make($input,$rules);
		if($validacion->fails()){
			return redirect()->to('afp/create')->withInput()->withErrors($validacion->messages());
		}
		$AFP = new AFP();
		$AFP->setAttribute('rut',$request->input('rut'));
		$AFP->setAttribute('nombre',$request->input('nombre'));
		$AFP->setAttribute('email',$request->input('email'));
		$AFP->setAttribute('telefono',$request->input('telefono'));
		$AFP->setAttribute('link_envio',$request->input('link'));
		$exito=$AFP->save();

		if ($exito) {
			Flash::success('AFP creada');
			return redirect('afp');
		} else {
			Flash::error('AFP no pudo ser creada');
			return redirect('afp');
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$AFP = AFP::find($id);
		return view('afp.show')->with('afp',$AFP);
	}



	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$AFP = AFP::find($id);
		$exito = $AFP->delete();
		if($exito){
			Flash::success('AFP eliminada con exito');
			return redirect('afp');
		}
		else{
			Flash::error('AFP no pudo ser eliminada');
			return redirect('afp');
		}
	}

}
