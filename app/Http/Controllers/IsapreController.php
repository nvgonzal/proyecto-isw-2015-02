<?php namespace App\Http\Controllers;

use App\Aseguradora;
use App\Http\Requests;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laracasts\Flash\Flash;

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
		$isapres = Aseguradora::orderBy('id')->paginate(10);

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
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$input = [
			'rut' => $request->input('rut'),
			'nombre' => $request->input('nombre'),
			'telefono' => $request->input('telefono'),
			'email' => $request->input('email'),
			'direccion_envio' => $request->input('link_envio'),
		];
		$rules = [
			'rut' => 'required|unique:salud,rut|max:14',
			'nombre' => 'required|max:40',
			'telefono' => 'max:35',
			'email' => 'max:50',
			'direccion_envio' => 'required',
		];
		$validacion = Validator::make($input,$rules);
		if($validacion->fails()){
			return redirect()->to('isapres/create')->withInput()->withErrors($validacion->messages());
		}
		$isapre = new Aseguradora();
		$isapre->setAttribute('rut',$request->input('rut'));
		$isapre->setAttribute('nombre',$request->input('nombre'));
		$isapre->setAttribute('telefono',$request->input('telefono'));
		$isapre->setAttribute('email',$request->input('email'));
		$isapre->setAttribute('link_envio',$request->input('link_envio'));
		$exito=$isapre->save();
		if($exito){
			Flash::success('ISAPRE ingresda correctamente');
			return(redirect('isapres'));
		}
		else{
			Flash::error('Error al ingresar ISAPRE');
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
		//
		$isapre = Aseguradora::find($id);
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
		return view('isapre.edit')->with('isapre',$isapre);
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
		$input = [
			'nombre' => $request->input('nombre'),
			'telefono' => $request->input('telefono'),
			'email' => $request->input('email'),
			'direccion_envio' => $request->input('link_envio'),
		];
		$rules = [
			'nombre' => 'required|max:40',
			'telefono' => 'max:35',
			'email' => 'max:50',
			'direccion_envio' => 'required|max:100',
		];
		$validacion = Validator::make($input,$rules);
		if($validacion->fails()){
			return redirect()->to('isapres/'.$id.'/edit')->withInput()->withErrors($validacion->messages());
		}
		$isapre = Aseguradora::find($id);
		$isapre->setAttribute('nombre', $request->input('nombre'));
		$isapre->setAttribute('telefono', $request->input('telefono'));
		$isapre->setAttribute('email', $request->input('email'));
		$isapre->setAttribute('link_envio', $request->input('link_envio'));
		$exito=$isapre->save();
		if($exito){
			Flash::success('Informacion de ISAPRE actualizada con exito');
			return redirect('isapres');
		}
		else{
			Flash::error('Informacion de ISAPRE no puedo ser actualizada');
			return redirect('isapres');
		}
 	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
        try {
            $isapre = Aseguradora::find($id);
            $exito = $isapre->delete();
            if ($exito) {
                Flash::success('ISAPRE eliminada con exito');
                return redirect('isapres');
            } else {
                Flash::error('ISAPRE no pudo ser eliminada');
                return redirect('isapres');
            }
        }
        catch(QueryException $e){
            Flash::error('¡ISAPRE no pudo ser eliminada porque tiene empleados asociada a ella!');
            return redirect('isapres');
        }

	}

}
