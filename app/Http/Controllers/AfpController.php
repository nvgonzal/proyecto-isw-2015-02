<?php namespace App\Http\Controllers;

use App\AFP;
use App\Http\Requests;
use Illuminate\Database\QueryException;
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
		$AFPs = AFP::orderBy('id')->paginate(10);
		return view('AFP.index')->with('AFPs',$AFPs);
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
		return view('AFP.edit')->with('AFP',$AFP);
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
			'direccion_envio' => $request->input('link_envio'),
		];
		$rules = [
			'nombre' => 'required|max:40',
			'email' => 'email|max:50',
			'telefono' => 'max:35',
			'direccion_envio' => 'required|max:50',
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
			Flash::success('Datos de la AFP han sido actualizados');
			return redirect('afp');
		} else {
			Flash::error('Datos de la AFP no pudieron ser actualizados');
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
		return view('AFP.create');
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
			'direccion_envio' => $request->input('link_envio'),
		];
		$rules = [
			'rut' => 'required|unique:afps,rut|max:14',
			'nombre' => 'required|max:40',
			'email' => 'email|max:50',
			'telefono' => 'max:35',
			'direccion_envio' => 'required|max:50',
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
		$AFP->setAttribute('link_envio',$request->input('link_envio'));
		$exito=$AFP->save();

		if ($exito) {
			Flash::success('AFP ingresada al sistema');
			return redirect('afp');
		} else {
			Flash::error('AFP no pudo ser ingresada');
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
		return view('AFP.show')->with('AFP',$AFP);
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
            $AFP = AFP::find($id);
            $exito = $AFP->delete();
            if ($exito) {
                Flash::success('AFP eliminada con exito');
                return redirect('afp');
            } else {
                Flash::error('AFP no pudo ser eliminada');
                return redirect('afp');
            }
        } catch (QueryException $e) {
            Flash::error('¡AFP no pudo ser eliminada porque tiene empleados asociada a ella!');
            return redirect('afp');
        }
	}

}
