<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Manten;

class MantenController extends Controller
{
   
public function index()
{
	$mantenimientos = Manten::all();
return view ('mantenpc.index', compact('mantenimientos'));
}

public function create()
{
	$proactivos = Manten::all();
return view ('mantenpc.create', compact('proactivos'));
}

public function store(Request $request)
{
//campo a validar
     //$this->validate($request, ['fecha_manten' => 'required']);
	 $this->validate($request, ['t_equipo' => 'required'],
	 	['t_equipo.required' => '*Por favor ingrese el tipo de equipo.'
	 	]);



	$proactivos = new Manten();
	$proactivos->t_equipo = $request->t_equipo;
	$proactivos->marca = $request->marca;
	$proactivos->modelo = $request->modelo;
	$proactivos->n_serie = $request->n_serie;
	$proactivos->fecha_manten = Carbon::parse ($request->fecha_manten);


	$proactivos->save();
	// Mensaje de guardado correctamente
	return redirect('Mantenimiento')->with ('flash', 'Tipo de mantenimiento registrado correctamente');



}

public function edit(Manten $manten)
{
	return view ('mantenpc.edit', compact ('manten'));
}

public function update (Manten $manten, Request $request)
{
$manten->t_equipo = $request->t_equipo;
	$manten->marca = $request->marca;
	$manten->modelo = $request->modelo;
	$manten->n_serie = $request->n_serie;
	$manten->fecha_manten = Carbon::parse ($request->fecha_manten);


	$manten->save();
	// Mensaje de guardado correctamente
	return redirect('Mantenimiento')->with ('flash', 'Tipo de mantenimiento editado correctamente');
}


public function destroy (Manten $manten)
{
	$manten->delete();
	return redirect()->route('Mantenimiento');
}


}
