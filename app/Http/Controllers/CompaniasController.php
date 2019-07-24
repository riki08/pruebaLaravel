<?php

namespace App\Http\Controllers;

use App\Companias;
use Illuminate\Http\Request;

class CompaniasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostrar todas las Compañias 
        $companias =  Companias::all();
        /* foreach ($companias as $com ) {
            var_dump($com->id);
        exit();# code...
        } */
        
    	return view('companias.index',['companias' => $companias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $compania = new Companias();
        $compania->Name = $request->get('Name');
        $compania->Email = $request->get('Email');
        $compania->logo = $request->file('logo');
        $compania->Website = $request->get('Website');
    	$compania->save();

        $file = $request->file('logo');
        //dd($file);
 
       //obtenemos el nombre del archivo
       $nombre = $file->getClientOriginalName();
       //var_dump($nombre); exit();
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       \Storage::disk('local')->put($nombre,  \File::get($file));

        //Companias::create($request->all());
        $compania->logo = $nombre;
        $compania->save();
        return redirect()->route('companias.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companias  $companias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $compania = Companias::findOrFail($id);        
         return view('companias.edit', compact('compania'));
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
    	$compania = Companias::findOrFail($id);
        $compania->Name = $request->get('Name');
        $compania->Email = $request->get('Email');
        $compania->logo = $request->get('logo');
        $compania->Website = $request->get('Website');
    	$compania->save();
    	 //redirecciona al index de companias
        return redirect()->route('companias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companias  $companias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compania = Companias::findOrFail($id);
        
        $compania->delete();

        return redirect()->route('companias.index');
    }
}
