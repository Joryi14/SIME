<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\JefeDeFamilia;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacionJefeDeFamilia;

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
    public function store(ValidacionJefeDeFamilia $request)
    {
        $patologia = implode(', ',$request->Patologia);
        $Jefe = DB::select("call Insert_JefeDeFamilia('$request->TotalPersonas','$request->Nombre','$request->Apellido1','$request->Apellido2',
       '$request->Cedula','$request->Edad','$request->sexo','$request->Telefono','$request->PcD','$request->MG','$request->PI','$request->PM','$patologia')");
        
        header("location: /JefeDeFamilia");
        
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
        $JefeF = JefeDeFamilia::find($id);
        return view('JefeDeFamilia.edit', compact('JefeF'));
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
        $patologia = implode(', ',$request->Patologia);
        $JefeF = DB::update("call Update_JefeDeFamilia('$id','$request->TotalPersonas','$request->Nombre','$request->Apellido1','$request->Apellido2','$request->Cedula','$request->Edad','$request->sexo','$request->Telefono','$request->PcD','$request->MG','$request->PI','$request->PM','$patologia')");
     
        header("location: /JefeDeFamilia");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $jefe = JefeDeFamilia::find($id);
        $jefe->delete();
        return redirect('JefeDeFamilia')->with('Se ha eliminado correctamente');
    }
}
