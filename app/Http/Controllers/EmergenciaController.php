<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionesEmergencia;
use App\Models\Albergue;
use Illuminate\Support\Facades\DB;
use App\Models\Emergencia;
use App\Models\EntregaDonaciones;
use App\Models\EntregaDonacionesAlbergue;
use App\Models\Inventario;
use App\Models\JefeDeFamilia;
use App\Models\Mensajeria;
use App\Models\PersonasAlbergue;
use App\Models\Retiro_PaquetesV;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
        return redirect('Emergencia')->with('exito','Se ha agregado correctamente');
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
     public function getEM(){
         $EM = Emergencia::orderby('idEmergencias','asc')->select('NombreEmergencias','Latitud','Longitud','Categoria','Radio','Estado')->where('Estado','Activa')->get();
         $response = array();
         foreach($EM as $emer){
            $response[] = array(
                 "Nombre"=>$emer->NombreEmergencias,
                 "Latitud"=>$emer->Latitud,
                 "Longitud"=>$emer->Longitud,
                 "Categoria"=>$emer->Categoria,
                 "Radio"=>$emer->Radio
            );
         }
         echo json_encode($response);
         exit;
     }
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
     return redirect('Emergencia')->with('exito','Se ha actualizado correctamente');
    }
    public function Estado($id)
    {
     $emergencia = Emergencia::find($id);
     if($emergencia->Estado =="Activa")
     {
     $emergencia->Estado = "Inactiva";
     $emergencia->save();
     $persona = PersonasAlbergue::where('idEmergencias',$id)->get(); 
     foreach($persona as $item){
        $jefe = JefeDeFamilia::find($item->idJefe);
        $albergue = Albergue::find($item->idAlbergue);
        $albergue->PersonasAlbergue = $albergue->PersonasAlbergue -$jefe->TotalPersonas;
        $albergue->save();
     }
     return redirect('Emergencia')->with('nota','Emergencia Inactiva');
     }
     else if($emergencia->Estado == "Inactiva")
     {
      $emergencia->Estado ="Activa";
      $emergencia->save();
      $persona = PersonasAlbergue::where('idEmergencias',$id)->get(); 
      foreach($persona as $item){
        $jefe = JefeDeFamilia::find($item->idJefe);
        $albergue = Albergue::find($item->idAlbergue);
        $albergue->PersonasAlbergue = $albergue->PersonasAlbergue +$jefe->TotalPersonas;
        $albergue->save();
    }
      return redirect('Emergencia')->with('nota2','Emergencia Activa');
    }
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
        if(Mensajeria::where('idEmergencia',$id)->first()){
        return redirect('Emergencia')->with('mensaje','No se puede eliminar la emergencia tiene mensajes');

        }
        if(EntregaDonaciones::where('idEmergencia',$id)->first()){
            return redirect('Emergencia')->with('mensaje','No se puede eliminar la emergencia tiene entregas de donaciones asignadas');
    
            }
        if(EntregaDonacionesAlbergue::where('idEmergencias',$id)->first()){
            return redirect('Emergencia')->with('mensaje','No se puede eliminar la emergencia tiene entregas de donaciones en albergue asignadas');
        }
        if(EntregaDonacionesAlbergue::where('idEmergencias',$id)->first()){
            return redirect('Emergencia')->with('mensaje','No se puede eliminar la emergencia tiene entregas de donaciones en albergue asignadas');
        }
        if(PersonasAlbergue::where('idEmergencias',$id)->first()){
            return redirect('Emergencia')->with('mensaje','No se puede eliminar la emergencia tiene personas en albergue asignadas');
        }
        if(Inventario::where('idEmergencias',$id)->first()){
            return redirect('Emergencia')->with('mensaje','No se puede eliminar la emergencia tiene inventario asignados');
        }
        if(Retiro_PaquetesV::where('idEmergencia',$id)->first()){
            return redirect('Emergencia')->with('mensaje','No se puede eliminar la emergencia tiene retiros de paquetes asignados');
        }
        $emergencia->delete();
        return redirect('Emergencia')->with('exito','Se ha eliminado correctamente');
    }

    public function ReporteFecha(request $request){
        
        $Emergencia = Emergencia::orderby('idEmergencias')->whereBetween('created_at', array($request->Fecha1,$request->Fecha2)) 
        ->get();
        $today = Carbon::now()->format('d/m/Y h:i:s A');
        $view = view ('Emergencia.reporte', compact('Emergencia', 'today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Emergencia'.'.pdf');
    }
    public function generar()
    {
        $Emergencia = Emergencia::orderBy('idEmergencias')->get();
        $today = Carbon::now()->format('d/m/Y h:i:s A'); 
        $view = view ('Emergencia.reporte', compact('Emergencia', 'today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Emergencia'.'.pdf');

    }
}
