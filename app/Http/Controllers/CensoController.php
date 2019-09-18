<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Censo;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacionCenso;
use App\Models\JefeDeFamilia;

class CensoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $censos = Censo::orderBy('IdCenso')->get();
        return view('Censo.index', compact('censos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Censo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionCenso $request)
    {
        if(JefeDeFamilia::find($request->IdJefeFam)!= NULL){
        $Censo = new Censo();
        $Censo->IdJefeFam = $request->IdJefeFam;
        $Censo->Refrigerador = $request->Refrigerador;
        $Censo->Cocina = $request->Cocina;
        $Censo->Colchon = $request->Colchon;
        $Censo->Cama = $request->Cama;
        $Censo->save();
        return redirect('Censo')->with('mensaje','Se guardo con exito');
        }
        else
        return redirect('Censo\create')->with('mensaje','Error el Jefe De Familia no Existe');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $censo = Censo::find($id);
        return view('Censo.edit', compact('censo'));
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
        $censo = DB::update("call Update_Censo('$id','$request->IdJefeFam'
        ,'$request->Refrigerador','$request->Cocina','$request->Colchon','
        $request->Cama')");  
    
     header("location: /Censo");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $censo = Censo::find($id);
        $censo->delete();
        return redirect('Censo')->with('Se ha eliminado correctamente');
        
    }
}
