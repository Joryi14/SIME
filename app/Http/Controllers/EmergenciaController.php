<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionesEmergencia;
use Illuminate\Support\Facades\DB;
use App\Models\Emergencia;
use Illuminate\Http\Request;

class EmergenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $emergencias = Emergencia::orderBy('idEmergencias')->get();
        return view('Emergencia.index', compact('emergencias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Emergencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionesEmergencia $request)
    {
        $Emergencia = new Emergencia();
        $Emergencia->fill($request->all());
        $Emergencia->save();
        return redirect('Emergencia')->with('mensaje','Se ha agregado correctamente');
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
        $emergencia = Emergencia::find($id);
        return view('Emergencia.edit', compact('emergencia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionesEmergencia $request, $id)
    {
        $emergencia = Emergencia::find($id);
     $emergencia->fill($request->all());
     $emergencia->save();
     return redirect('Emergencia')->with('mensaje','Se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $emergencia = Emergencia::find($id);
        $emergencia->delete();
        return redirect('Emergencia')->with('Se ha eliminado correctamente');
    }
}
