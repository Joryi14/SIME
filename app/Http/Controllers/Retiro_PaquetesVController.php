<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionRetiroPaquetes;
use App\Models\Inventario;
use Illuminate\Support\Facades\DB;
use App\Models\Retiro_PaquetesV;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
    public function store(ValidacionRetiroPaquetes $request)
    {
        $inv = inventario::find($request->IdInventario);
        $vol = User::find($request->IdVoluntario);
        if($inv != null){
        if($vol != null){
        if(($request->SuministrosGobierno + $request->SuministrosComision) <= $inv->Suministros){
        $retiroPV = DB::select("call Insert_RetiroPaquetes('$request->IdAdministradorI','$request->NombreChofer','$request->Apellido1C','$request->Apellido2C',
        '$request->IdVoluntario','$request->PlacaVehiculo','$request->DireccionAEntregar','$request->SuministrosGobierno','$request->SuministrosComision',
        '$request->IdInventario')");  
        return redirect('/Retiro_PaquetesV')->with('mensaje','Se ha agregado con éxito');
    }
    else
    return redirect('/Retiro_PaquetesV/create')->with('mensaje','Cantidad de paquetes insuficientes');
}
   else 
     return redirect('/Retiro_PaquetesV/create')->with('mensaje','Voluntario no existe');
}
        else 
        return redirect('/Retiro_PaquetesV/create')->with('mensaje','Inventario no existe');
    }

    public function generar()
    {
        $Retiro = \DB::table('retiropaquetes')
       ->select(['IdRetiroPaquetes','IdAdministradorI' ,'NombreChofer','Apellido1C','Apellido2C',
        'IdVoluntario','PlacaVehiculo','DireccionAEntregar','SuministrosGobierno','SuministrosComision',
        'IdInventario']) 
        ->get();
        $today = Carbon::now()->format('d/m/Y');
        $view = view ('Retiro_PaquetesV.reporte', compact('Retiro', 'today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper("A4", "landscape");
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
    public function update(ValidacionRetiroPaquetes $request, $id)
    {
        $retiroPV = DB::update("call Update_RetiroPaquetes('$id','$request->IdAdministradorI','$request->NombreChofer','$request->Apellido1C','$request->Apellido2C',
        '$request->IdVoluntario','$request->PlacaVehiculo','$request->DireccionAEntregar','$request->SuministrosGobierno','$request->SuministrosComision',
        '$request->IdInventario')");  
        return redirect('Retiro_PaquetesV')->with('mensaje','Se ha actualizado correctamente');
    
    }
    public function getUsers(Request $request){

        $search = $request->search;
  
        if($search == ''){
           $Users = User::orderby('Cedula','asc')->select('id','Cedula')->limit(5)->get();
        }else{
           $Users = User::orderby('Cedula','asc')->select('id','Cedula')->where('Cedula', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($Users as $user){
           $response[] = array(
                "id"=>$user->id,
                "text"=>$user->Cedula
           );
        }
  
        echo json_encode($response);
        exit;
     }
     public function getInventario(Request $request){
        $search = $request->search;
  
        if($search == ''){
           $Inven = Inventario::orderby('idInventario','asc')->select('idInventario')->limit(5)->get();
        }else{
           $Inven = Inventario::orderby('idInventario','asc')->select('idInventario')->where('idInventario', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($Inven as $Inv){
           $response[] = array(
                "id"=>$Inv->idInventario,
                "text"=>$Inv->idInventario
           );
        }
  
        echo json_encode($response);
        exit;
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
