<?php

namespace App\Http\Controllers;

use App\Models\Familias;
use Illuminate\Http\Request;

class FamiliasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Familias = Familias::orderBy('IdFamilia')->get();
        return view('Familias.index', compact('Familias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Familias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Familia = new Familias();  
        $Familia->IdJefeF = $request->IdJefeF;    
        $Familia->Nombre = $request->Nombre;
        $Familia->Apellido1 = $request->Apellido1;
        $Familia->Apellido2 = $request->Apellido2;
        $Familia->Cedula = $request->Cedula;
        $Familia->Parentesco = $request->Parentesco;
        $Familia->Edad = $request->Edad;
        $Familia->sexo = $request->sexo;
        $Familia->PcD = $request->PcD;
        $Familia->MG = $request->MG;
        $Familia->PI = $request->PI;
        $Familia->PM = $request->PM;
        $Familia->Patologia = $request->Patologia;
        $Familia->save();  
        header("location: /Familias");
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
        $Familia = Familias::find($id);
        return view('Familias.edit', compact('Familia'));
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
        $Familia = Familias::find($id);
        $Familia->fill($request->all());
        $Familia->save();
     header("location: /Familias");
    
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
            if (Familias::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    
    }
}
