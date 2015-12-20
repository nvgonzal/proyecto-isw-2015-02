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
		$AFP = new AFP();
		dd($request);
		$AFP->setAttribute('rut',$request->input('rut'));
		$AFP->setAttribute('nombre',$request->input('nombre'));
		$AFP->setAttribute('email',$request->input('email'));
		$AFP->setAttribute('telefono',$request->input('telefono'));
		$AFP->setAttribute('link',$request->input('link'));
		$now = date('Y-m-d H:i:s');
		$AFP->setAttribute('created_at',$now);
		$AFP->setAttribute('updated_at',$now);
		$AFP->save();
		return view('AFP.createexito');
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
	public function edit($id)
	{
		//
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
