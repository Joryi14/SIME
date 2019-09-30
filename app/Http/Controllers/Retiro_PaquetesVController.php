<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Retiro_PaquetesV;
use Illuminate\Http\Request;

class Retiro_PaquetesVController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $retiroPV = Retiro_PaquetesV::orderBy('IdRetiroPaquetes')->get();
        return view('Retiro_PaquetesV.index', compact('retiroPV'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Retiro_PaquetesV.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $retiroPV = DB::select("call Insert_RetiroPaquetes('$request->IdChofer','$request->IdAdministradorI',
        '$request->IdVoluntario','$request->PlacaVehiculo','$request->DireccionAEntregar','$request->SuministrosGobierno','$request->SuministrosComision',
        '$request->IdInventario')");  
        header("location:Retiro_PaquetesV /");
    }

    public function generar()
    {
        $Retiro = \DB::table('retiropaquetes')
       ->select(['IdRetiroPaquetes','IdChofer','IdAdministradorI',
        'IdVoluntario','PlacaVehiculo','DireccionAEntregar','SuministrosGobierno','SuministrosComision',
        'IdInventario']) 
        ->get();
        $view = view ('Retiro_PaquetesV.reporte', compact('Retiro'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Retiro'.'.pdf');

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
        $retiroPV = Retiro_PaquetesV::find($id);
        return view('Retiro_PaquetesV.edit', compact('retiroPV'));
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
        $retiroPV = DB::update("call Update_RetiroPaquetes('$id','$request->IdChofer','$request->IdAdministradorI',
        '$request->IdVoluntario','$request->PlacaVehiculo','$request->DireccionAEntregar','$request->SuministrosGobierno','$request->SuministrosComision',
        '$request->IdInventario')");  
        header("location: /Retiro_PaquetesV");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $retiroPV = Retiro_PaquetesV::find($id);
      $retiroPV->delete();
      return redirect('Retiro_PaquetesV')->with('Se ha eliminado correctamente');
    }
}
