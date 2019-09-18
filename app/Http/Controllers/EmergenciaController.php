<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionesEmergencia;
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
        $emergencia = new Emergencia();  
        $emergencia->NombreEmergencias = $request->NombreEmergencias;
        $emergencia->Categoria = $request->Categoria;
        $emergencia->TipoDeEmergencia = $request->TipoDeEmergencia;      
        $emergencia->Descripcion = $request->Descripcion;
        $emergencia->Longitud = $request->Longitud;
        $emergencia->Latitud =  $request->Latitud;
        $emergencia->save();
        header("location: /Emergencia");

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
     header("location: /Emergencia");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        if ($request->ajax()) {
            if (Emergencia::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
