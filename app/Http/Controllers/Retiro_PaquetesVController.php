<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionRetiroPaquetes;
use App\Models\Emergencia;
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
    public function getEmergeR(Request $request){

        $search = $request->search;
        if($search == ''){
           $Emergencia = Emergencia::orderby('idEmergencias','asc')->select('idEmergencias','NombreEmergencias','Estado')->where('Estado','Activa')->limit(5)->get();
        }else{
           $Emergencia = Emergencia::orderby('idEmergencias','asc')->select('idEmergencias','NombreEmergencias','Estado')->where('NombreEmergencias', 'like', '%' .$search . '%')->where('Estado','Activa')->limit(5)->get();
        }
        $response = array();
        foreach($Emergencia as $Emer){
           $response[] = array(
                "id"=>$Emer->idEmergencias,
                "NombreEmergencias"=>$Emer->NombreEmergencias
           );
        }
        echo json_encode($response);
        exit;
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
            $request->idEmergencia = $inv->idEmergencias;
        if(($request->SuministrosGobierno + $request->SuministrosComision) <= $inv->Suministros){
            $retiroPV = new Retiro_PaquetesV();
            $retiroPV->fill($request->all());
            $retiroPV->idEmergencia = $inv->idEmergencias;
            $retiroPV->save();

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
        $today = Carbon::now()->format('d/m/Y h:i:s A');
        $view = view ('Retiro_PaquetesV.reporte', compact('Retiro', 'today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper("A4", "landscape");
        $pdf->loadHTML($view);
        return $pdf->stream('Retiro'.'.pdf');

    }
    public function ReporteFecha(request $request){
        
        $Retiro = \DB::table('retiropaquetes')
       ->select(['IdRetiroPaquetes','IdAdministradorI' ,'NombreChofer','Apellido1C','Apellido2C',
        'IdVoluntario','PlacaVehiculo','DireccionAEntregar','SuministrosGobierno','SuministrosComision',
        'IdInventario'])->whereBetween('created_at', array($request->Fecha1,$request->Fecha2)) 
        ->get();
        $today = Carbon::now()->format('d/m/Y h:i:s A');
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
        $retiroPV = Retiro_PaquetesV::find($id);
        $retiroPV->fill($request->all());
        $retiroPV->save();
    
        return redirect('Retiro_PaquetesV')->with('mensaje','Se ha actualizado correctamente');
    
    }
    public function getUsers(Request $request){

        $search = $request->search;
  
        if($search == ''){
           $Users = User::orderby('Cedula','asc')->select('id','Cedula','name','Apellido1','Apellido2')->limit(5)->get();
        }else{
           $Users = User::orderby('Cedula','asc')->select('id','Cedula','name','Apellido1','Apellido2')->where('Cedula', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($Users as $user){
           $response[] = array(
                "id"=>$user->id,
                "Cedula"=>$user->Cedula,
                "name"=>$user->name,
                "Apellido1"=>$user->Apellido1,
                "Apellido2"=>$user->Apellido2
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
