<?php namespace App\Http\Controllers;

use App\Aseguradora;
use App\Http\Requests;
use Illuminate\Http\Request;

class IsapreController extends Controller {

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
		$isapres = Aseguradora::paginate(10);

		return view('isapre.index')->with('isapres',$isapres);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return view('isapre.create');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $re
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		$input = [
			'Rut Institucion' => $request->input('Rut Institucion'),
			'Nombre Isapre' => $request->input('Nombre Isapre'),
			'Telefono' => $request->input('Telefono'),
			'E-mail' => $request->input('E-mail'),
			'Link' => $request->input('Link'),
		];
		$rules = [
			'Rut Institucion' => 'required|unique:empleados','Rut Institucion',
			'Nombre Isapre' => 'required',
			'Telefono' => 'required|Telefono',
			'E-mail' => 'required',
			'link' => 'required|url',
		];
		$validacion = Validator::make($input,$rules);
		if($validacion->fails()){
			return redirect()->to('isapre/create')->withInput()->withErrors($validacion->messages());
		}
		$isapre = new Aseguradora();
		$isapre->setAttribute('Rut Institucion',$request->input('Rut Institucion'));
		$isapre->setAttribute('Nombre Isapre',$request->input('Nombre Isapre'));
		$isapre->setAttribute('Telefono',$request->input('Telefono'));
		$isapre->setAttribute('E-mail',$request->input('E-mail'));
		$isapre->save();
		return view('isapre.createexito');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$isapre = isapre::find($id);
		return view('isapre.show')->with('isapre',$isapre);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$isapre = Aseguradora::find($id);
		return redirect('isapre.edit.editar')->with('isapre',$isapre);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		dd($request);
			$input = [
						'Rut Institucion' => $request->input('Rut Institucion'),
						'Nombre Isapre' => $request->input('Nombre Isapre'),
						'Telefono' => $request->input('Telefono'),
						'E-mail' => $request->input('E-mail'),
						'Link'=>$request->input('Link'),
			];
				$rules = [
						'Rut Institucion' => 'required|unique:isapre,Rut Institucion',
						'Nombre Isapre' => 'required',
						'Telefono' => 'required',
						'E-mail' => 'required|E-mail',
						'Link'=>'required',
							];
				$validacion = Validator::make($input,$rules);
				if($validacion->fails()){
					return redirect()->to('isapre/create')->withInput()->withErrors($validacion->messages());
		}
		$isapre = isapre::find($id);
		$isapre->setAttribute('Rut Institucion',$request->input('Rut Institucion'));
		$isapre->setAttribute('Nombre Isapre',$request->input('Nombre Isapre'));
		$isapre->setAttribute('Telefono',$request->input('Telefono'));
		$isapre->setAttribute('E-mail',$request->input('E-mail'));
		$isapre->setAttribute('Link',$_REQUEST->input('Link'));

		/*$now = date('Y-m-d H:i:s');
		$isapre->setAttribute('updated_at',$now);*/
		$isapre->save();
		Flash::success('ingresado con exito');
		return redirect('isapre');
 	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
			$isapre = isapre::find($id);
			$exito=$isapre->delete();
			if($exito){
				Flash::success(' eliminada con exito');
				return redirect('isapre');
			}
			else{
				Flash::error('no fue eliminada');
				return redirect('isapre');
			}


	}

}
