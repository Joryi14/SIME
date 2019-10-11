<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Familias;
use App\Models\JefeDeFamilia;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacionFamilia;

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
    public function store(ValidacionFamilia $request)
    {
        if(JefeDeFamilia::find($request->IdJefeF)){
         $Patologia = implode(', ',$request->Patologia);
         $Familia = DB::select("call Insert_Familia('$request->IdJefeF','$request->Nombre','$request->Apellido1','$request->Apellido2','$request->Cedula','$request->Parentesco','$request->Edad','$request->sexo','$request->PcD','$request->MG','$request->PI','$request->PM','$Patologia')");
         return redirect('Familias')->with('mensaje','Se ha agregado correctamente');
        }
        else
        return redirect('Familias/create')->with('mensaje','Error El jefe de familia no existe');
    
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
        $Patologia = implode(', ',$request->Patologia);
        $Familia = DB::update("call Update_Familia('$id','$request->IdJefeF','$request->Nombre','$request->Apellido1','$request->Apellido2','$request->Cedula','$request->Parentesco','$request->Edad','$request->sexo','$request->PcD','$request->MG','$request->PI','$request->PM','$Patologia')");
      
        return redirect('Familias')->with('mensaje','Se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $familia = Familias::find($id);
        $familia->delete();
        return redirect('Familias')->with('mensaje','Se ha eliminado correctamente');
    
    }
}
