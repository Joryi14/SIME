<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidacionEntregaDonacionesAlbergue;
use App\Models\Albergue;
use App\Models\Emergencia;
use App\Models\EntregaDonaciones;
use Illuminate\Support\Facades\DB;
use App\Models\JefeDeFamilia;
use App\Models\EntregaDonacionesAlbergue;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EntregaDonacionesAlbergueController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entregadonacionesAlbergue = EntregaDonacionesAlbergue::orderBy('IdEntregaA')->get();
        return view('EntregaDonacionesAlbergue.index', compact('entregadonacionesAlbergue'));
    }
    public function index2()
    {
      $entrega = new EntregaDonacionesAlbergue();
      $entrega = DB::table('entregadonacionesalbergue')->join('emergencia','entregadonacionesalbergue.idEmergencias','=','emergencia.idEmergencias')->join('jefedefamilia','entregadonacionesalbergue.IdJefeFa','=','jefedefamilia.IdJefe')->join('albergue','entregadonacionesalbergue.idAlbergue','=','albergue.idAlbergue')->where('emergencia.Estado','Activa')->select('entregadonacionesalbergue.IdEntregaA',
      'albergue.idAlbergue','albergue.Nombre','jefedefamilia.IdJefe','jefedefamilia.Cedula',
      'emergencia.idEmergencias',
      'jefedefamilia.Nombre','jefedefamilia.Apellido1'
      ,'emergencia.NombreEmergencias'
      ,'entregadonacionesalbergue.created_at')->get();
      return view('EntregaDonacionesAlbergue.indexFiltrado', compact('entrega'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('EntregaDonacionesAlbergue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionEntregaDonacionesAlbergue $request)
    {
        if(JefeDeFamilia::find($request->IdJefeFa)){
            if(Albergue::find($request->idAlbergue)){
               if(Emergencia::find($request->idEmergencias)){
         if(EntregaDonaciones::where('IdJefe',$request->IdJefeFa)->first()){
            return redirect('EntregaDonaciones')->with('mensaje','Este jefe ya tiene una entrega de Donaciones');
         }
        $entr = new EntregaDonacionesAlbergue();
        $entr->fill($request->all());
        $entr->save();
        return redirect('EntregaDonacionesAlbergue/Filtrado')->with('exito','Se ha agregado correctamente');
            }
         else
         return redirect('EntregaDonacionesAlbergue/create')->with('mensaje','Error Emergencia no existe');
         }
    else
    return redirect('EntregaDonacionesAlbergue/create')->with('mensaje','Error Albergue no existe');
    }
        else
        return redirect('EntregaDonacionesAlbergue/create')->with('mensaje','Error el jefe de familia no existe');
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
    public function getAlbergue(Request $request){

        $search = $request->search;
        if($search == ''){
           $Albergue = Albergue::orderby('idAlbergue','asc')->select('idAlbergue','Nombre')->limit(5)->get();
        }else{
           $Albergue = Albergue::orderby('idAlbergue','asc')->select('idAlbergue','Nombre')->where('Nombre', 'like', '%' .$search . '%')->limit(5)->get();
        }
        $response = array();
        foreach($Albergue as $Alber){
           $response[] = array(
                "id"=>$Alber->idAlbergue,
                "text"=>$Alber->Nombre
           );
        }
        echo json_encode($response);
        exit;
     }
     public function getEmergencia(Request $request){

        $search = $request->search;
        if($search == ''){
           $Emergencia = Emergencia::orderby('idEmergencias','asc')->select('idEmergencias','NombreEmergencias')->where('Estado','Activa')->limit(5)->get();
        }else{
           $Emergencia = Emergencia::orderby('idEmergencias','asc')->select('idEmergencias','NombreEmergencias')->where('Estado','Activa')->where('idEmergencias', 'like', '%' .$search . '%')->orWhere('NombreEmergencias', 'like', '%' .$search . '%')->limit(5)->get();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entregadonacionesA = EntregaDonacionesAlbergue::find($id);
        return view('EntregaDonacionesAlbergue.edit', compact('entregadonacionesA'));
    }

    public function getIdJefeFa(Request $request){
        $search = $request->search;
        if($search == ''){
           $Jefes = JefeDeFamilia::orderby('Cedula','asc')->select('IdJefe','Cedula','Nombre','Apellido1','Apellido2')->limit(5)->get();
        }else{
           $Jefes = JefeDeFamilia::orderby('Cedula','asc')->select('IdJefe','Cedula','Nombre','Apellido1','Apellido2')->where('Cedula', 'like', '%' .$search . '%')->orWhere('Nombre', 'like', '%' .$search . '%')->limit(5)->get();
        }
        $response = array();
        foreach($Jefes as $jefe){
           $response[] = array(
                "id"=>$jefe->IdJefe,
                "Cedula"=>$jefe->Cedula,
                "Nombre"=>$jefe->Nombre,
                "Apellido1"=>$jefe->Apellido1,
                "Apellido2"=>$jefe->Apellido2
           );
        }

        echo json_encode($response);
        exit;
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionEntregaDonacionesAlbergue $request, $id)
    {
      $EntregaDonacionesAlbergue = EntregaDonacionesAlbergue::find($id);
      $EntregaDonacionesAlbergue->fill($request->all());
      $EntregaDonacionesAlbergue->save();
        return redirect('EntregaDonacionesAlbergue/Filtrado')->with('exito','Se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $EntregaDonacionesAlbergue = EntregaDonacionesAlbergue::find($id);
        $EntregaDonacionesAlbergue->delete();
        return redirect('EntregaDonacionesAlbergue/Filtrado')->with('exito','Se ha eliminado correctamente');
    }

    public function ReporteFecha(request $request){
        
      $EntregaDonacionesAlbergue = EntregaDonacionesAlbergue::orderby('IdEntregaA')->whereBetween('created_at', array($request->Fecha1,$request->Fecha2)) 
      ->get();
      $today = Carbon::now()->format('d/m/Y h:i:s A');
      $view = view ('EntregaDonacionesAlbergue.reporte', compact('EntregaDonacionesAlbergue', 'today'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('EntregaDonacionesAlbergue'.'.pdf');
  }
  public function generar()
  {
      $EntregaDonacionesAlbergue = EntregaDonacionesAlbergue::orderBy('IdEntregaA')->get();
      $today = Carbon::now()->format('d/m/Y h:i:s A'); 
      $view = view ('EntregaDonacionesAlbergue.reporte', compact('EntregaDonacionesAlbergue', 'today'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('EntregaDonacionesAlbergue'.'.pdf');

  }


  public function ReporteFechaF(request $request){
        
   $EntregaDonacionesAlbergue  = new EntregaDonacionesAlbergue();
   $EntregaDonacionesAlbergue = DB::table('entregadonacionesalbergue')
   ->join('emergencia','entregadonacionesalbergue.idEmergencias','=','emergencia.idEmergencias')
   ->join('jefedefamilia','entregadonacionesalbergue.IdJefeFa','=','jefedefamilia.IdJefe')
   ->join('albergue','entregadonacionesalbergue.idAlbergue','=','albergue.idAlbergue')
   ->where('emergencia.Estado','Activa')
   ->whereBetween('entregadonaciones.created_at', array($request->Fecha1,$request->Fecha2))
   ->select('entregadonacionesalbergue.IdEntregaA',
   'albergue.idAlbergue','albergue.Nombre','jefedefamilia.IdJefe','jefedefamilia.Cedula',
   'emergencia.idEmergencias',
   'jefedefamilia.Nombre','jefedefamilia.Apellido1'
   ,'emergencia.NombreEmergencias'
   ,'entregadonacionesalbergue.created_at')->get();
   $today = Carbon::now()->format('d/m/Y h:i:s A');
   $view = view ('EntregaDonacionesAlbergue.reporteF', compact('EntregaDonacionesAlbergue', 'today'))->render();
   $pdf = \App::make('dompdf.wrapper');
   $pdf->loadHTML($view);
   return $pdf->stream('EntregaDonacionesAlbergue'.'.pdf');
}
public function generarF()
{
   $EntregaDonacionesAlbergue = new EntregaDonacionesAlbergue();
   $EntregaDonacionesAlbergue = DB::table('entregadonacionesalbergue')->join('emergencia','entregadonacionesalbergue.idEmergencias','=','emergencia.idEmergencias')->join('jefedefamilia','entregadonacionesalbergue.IdJefeFa','=','jefedefamilia.IdJefe')->join('albergue','entregadonacionesalbergue.idAlbergue','=','albergue.idAlbergue')->where('emergencia.Estado','Activa')->select('entregadonacionesalbergue.IdEntregaA',
   'albergue.idAlbergue','albergue.Nombre','jefedefamilia.IdJefe','jefedefamilia.Cedula',
   'emergencia.idEmergencias',
   'jefedefamilia.Nombre','jefedefamilia.Apellido1'
   ,'emergencia.NombreEmergencias'
   ,'entregadonacionesalbergue.created_at')->get();
   $today = Carbon::now()->format('d/m/Y h:i:s A'); 
   $view = view ('EntregaDonacionesAlbergue.reporteF', compact('EntregaDonacionesAlbergue', 'today'))->render();
   $pdf = \App::make('dompdf.wrapper');
   $pdf->loadHTML($view);
   return $pdf->stream('EntregaDonacionesAlbergue'.'.pdf');

}
   }
