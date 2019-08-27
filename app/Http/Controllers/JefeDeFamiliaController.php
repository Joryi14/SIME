<?php

namespace App\Http\Controllers;

use App\Models\JefeDeFamilia;
use Illuminate\Http\Request;

class JefeDeFamiliaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $JefeF = JefeDeFamilia::orderBy('IdJefe')->get();
        return view('JefeDeFamilia.index', compact('JefeF'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('JefeDeFamilia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Jefe = new JefeDeFamilia();  
        $Jefe->TotalPersonas = $request->TotalPersonas;    
        $Jefe->Nombre = $request->Nombre;
        $Jefe->Apellido1 = $request->Apellido1;
        $Jefe->Apellido2 = $request->Apellido2;
        $Jefe->Cedula = $request->Cedula;
        $Jefe->Edad = $request->Edad;
        $Jefe->sexo = $request->sexo; 
        $Jefe->Telefono = $request->Telefono;
        $Jefe->PcD = $request->PcD;
        $Jefe->MG = $request->MG;
        $Jefe->PI = $request->PI;
        $Jefe->PM = $request->PM;
        $Jefe->Patologia = $request->Patologia;
        $Jefe->save();  
        
        return view('JefeDeFamilia.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
