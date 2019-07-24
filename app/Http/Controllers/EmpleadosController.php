<?php

namespace App\Http\Controllers;

use App\Empleados;
use Illuminate\Http\Request;
use App\Companias;

class EmpleadosController extends Controller
{
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostrar todas las Compañias 
        $empleado =  Empleados::all();
       /*  foreach ($empleado as $empleados) {
            var_dump($empleados->id);exit();
        } */
    	return view('empleados.index',['empleado' => $empleado]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companias = Companias::all();
        return view('empleados.create', compact('companias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $empleado = Empleados::create($request->all());
        $empleado->First_name = $request->get('First_name');
        $empleado->Last_name = $request->get('Last_name');
        $empleado->Email = $request->get('Email');
        $empleado->phone = $request->get('phone');
        $empleado->company_id = $request->get('company_id');
    	$empleado->save();
        return redirect()->route('empleados.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companias  $companias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
         $empleado = Empleados::findOrFail($id);  
         //$companias = Companias::find()->where('id', $empleado->company_id);  
         $companias = Companias::all();
         //var_dump($companias); exit();   
         return view('empleados.edit', compact('empleado', 'companias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companias  $companias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$empleado = Empleados::findOrFail($id);
        $empleado->First_name = $request->get('First_name');
        $empleado->Last_name = $request->get('Last_name');
        $empleado->Email = $request->get('Email');
        $empleado->phone = $request->get('phone');
        $empleado->company_id = $request->get('company_id');
    	$empleado->save();
        return redirect()->route('empleados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companias  $companias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empleado = Empleados::findOrFail($id);
        //borra a dicha fruta
        $empleado->delete();
        //redirecciona al index de frutas
        return redirect()->route('empleados.index');
    }
}
