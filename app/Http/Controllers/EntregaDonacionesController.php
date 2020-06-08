<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionEntregaDonaciones;
use App\Models\Emergencia;
use Illuminate\Support\Facades\DB;
use App\Models\EntregaDonaciones;
use App\Models\EntregaDonacionesAlbergue;
use App\Models\JefeDeFamilia;
use App\Models\Retiro_PaquetesV;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EntregaDonacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entregadonaciones = EntregaDonaciones::orderBy('IdEntrega')->get();
        
        return view('EntregaDonaciones.index', compact('entregadonaciones'));
    }
    public function index2()
    {
        $entregadonaciones = new EntregaDonaciones();
        $entregadonaciones = DB::table('entregadonaciones')->join('emergencia','idEmergencia','=','emergencia.idEmergencias')->join('jefedefamilia','entregadonaciones.IdJefe','=','jefedefamilia.IdJefe')->join('users','IdVoluntario','=','users.id')->where('emergencia.Estado','Activa')->select('entregadonaciones.IdEntrega','entregadonaciones.created_at','entregadonaciones.IdRetiroPaquetes','entregadonaciones.Cantidad','entregadonaciones.Foto','users.Cedula as Ced','users.name','jefedefamilia.Cedula','jefedefamilia.Nombre','jefedefamilia.Apellido1','emergencia.idEmergencias','emergencia.NombreEmergencias')->get();
        
        return view('EntregaDonaciones.IndexFiltrado', compact('entregadonaciones'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('EntregaDonaciones.create');
    }
    public function getEmergeE(Request $request){

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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionEntregaDonaciones $request)
    {    
        $retiro = Retiro_PaquetesV::find($request->IdRetiroPaquetes);
        $jefe = JefeDeFamilia::find($request->IdJefe);
        if($retiro != Null){
            if($jefe != Null){
        if(EntregaDonaciones::where('IdJefe',$request->IdJefe)->where('idEmergencia',$retiro->idEmergencia)->first() ){
            return redirect('EntregaDonaciones/Filtrado')->with('mensaje','Este jefe ya tiene una entrega');   
        }
            if(EntregaDonacionesAlbergue::where('IdJefeFa',$request->IdJefe)->where('idEmergencias',$retiro->idEmergencia)->first()){
            return redirect('EntregaDonaciones/Filtrado')->with('mensaje','Este jefe ya tiene una entrega en el albergue');
        }
        else{
        $entregadonaciones = new EntregaDonaciones();
        if($request->hasFile('Foto')){
            $file =$request->file('Foto');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/Foto/', $name);
            $entregadonaciones->Foto = $name;
            } 
          $entregadonaciones->IdVoluntario = $request->IdUsuarioRol;
          $entregadonaciones->IdJefe = $request->IdJefe;
          $entregadonaciones->IdRetiroPaquetes = $request->IdRetiroPaquetes;
          //$entregadonaciones->Foto = $request->Foto;
          $entregadonaciones->idEmergencia = $retiro->idEmergencia;
          $entregadonaciones->created_at = Carbon::now();
          $entregadonaciones->save(); 
          return redirect('EntregaDonaciones/Filtrado')->with('exito','Se ha agregado correctamente'); 
            }
        }else return redirect('EntregaDonaciones/create')->with('mensaje','Error al agregar, jefe de familia no existe'); 
                  
    }
else 
    return redirect('EntregaDonaciones/create')->with('mensaje','Error al agregar, el id del retiro de paquetes no existe');
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
    public function aumentarCantidad($id)
    {
        $entregadonaciones = EntregaDonaciones::find($id);
        $entregadonaciones->Cantidad =$entregadonaciones->Cantidad+1;
        $entregadonaciones->save();
        return redirect('EntregaDonaciones/Filtrado')->with('exito','Se ha aumentado la entrega correctamente');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entregadonaciones = EntregaDonaciones::find($id);
        return view('EntregaDonaciones.edit', compact('entregadonaciones'));
    }
    public function getJefe(Request $request){

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
     public function getPaquete(Request $request){

        $search = $request->search;
        if($search == ''){
           $Retiro = Retiro_PaquetesV::orderby('IdRetiroPaquetes','asc')->join('emergencia','idEmergencia','=','emergencia.idEmergencias')->select('IdRetiroPaquetes')->where('emergencia.Estado','Activa')->limit(5)->get();
        }else{
           $Retiro = Retiro_PaquetesV::orderby('IdRetiroPaquetes','asc')->join('emergencia','idEmergencia','=','emergencia.idEmergencias')->select('IdRetiroPaquetes')->where('IdRetiroPaquetes', 'like', '%' .$search . '%')->where('emergencia.Estado','Activa')->limit(5)->get();
        }
        $response = array();
        foreach($Retiro as $reti){
           $response[] = array(
                "id"=>$reti->IdRetiroPaquetes,
                "text"=>$reti->IdRetiroPaquetes
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
    public function update(ValidacionEntregaDonaciones $request, $id)
    {
        $entregadonaciones = EntregaDonaciones::find($id);
        $entregadonaciones->IdVoluntario = $request->IdUsuarioRol;
        $entregadonaciones->IdJefe = $request->IdJefe;
        $entregadonaciones->IdRetiroPaquetes = $request->IdRetiroPaquetes;
        $entregadonaciones->idEmergencia = $request->idEmergencia;
        if($request->hasFile('Foto')){
            $file =$request->file('Foto');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/Foto/', $name);
            $entregadonaciones->Foto = $name;
          } 
        $entregadonaciones->save();
        return redirect('EntregaDonaciones/Filtrado')->with('exito','Se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $entregadonaciones = EntregaDonaciones::find($id);
        if($entregadonaciones ->Foto != NULL){
            $image_path = public_path().'/Foto/'.$entregadonaciones->Foto;
            unlink($image_path);}
        $entregadonaciones->delete();
        return redirect('EntregaDonaciones/Filtrado')->with('exito','Se ha eliminado correctamente');
    }



    public function ReporteFecha(request $request){
        
        $EntregaDonaciones = EntregaDonaciones::orderby('IdEntrega')->whereBetween('created_at', array($request->Fecha1,$request->Fecha2)) 
        ->get();
        $today = Carbon::now()->format('d/m/Y h:i:s A');
        $view = view ('EntregaDonaciones.reporte', compact('EntregaDonaciones', 'today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('EntregaDonaciones'.'.pdf');
    }
    public function generar()
    {
        $EntregaDonaciones = EntregaDonaciones::orderBy('IdEntrega')->get();
        $today = Carbon::now()->format('d/m/Y h:i:s A'); 
        $view = view ('EntregaDonaciones.reporte', compact('EntregaDonaciones', 'today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('EntregaDonaciones'.'.pdf');

    }


    

    public function ReporteFechaF(request $request){
        
        $EntregaDonaciones = new EntregaDonaciones();
        $EntregaDonaciones = DB::table('entregadonaciones')
        ->join('emergencia','idEmergencia','=','emergencia.idEmergencias')
        ->join('jefedefamilia','entregadonaciones.IdJefe','=','jefedefamilia.IdJefe')
        ->join('users','IdVoluntario','=','users.id')
        ->where('emergencia.Estado','Activa')->whereBetween('entregadonaciones.created_at', array($request->Fecha1,$request->Fecha2))
        ->select('entregadonaciones.IdEntrega','entregadonaciones.created_at','entregadonaciones.IdRetiroPaquetes','entregadonaciones.Cantidad','entregadonaciones.Foto','users.Cedula as Ced','users.name','jefedefamilia.Cedula','jefedefamilia.Nombre','jefedefamilia.Apellido1','emergencia.idEmergencias','emergencia.NombreEmergencias')
        ->get();
        $today = Carbon::now()->format('d/m/Y h:i:s A');
        $view = view ('EntregaDonaciones.reporteF', compact('EntregaDonaciones', 'today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('EntregaDonaciones'.'.pdf');
    }
    public function generarF()
    {
       
        $EntregaDonaciones = new EntregaDonaciones();
        $EntregaDonaciones = DB::table('entregadonaciones')->join('emergencia','idEmergencia','=','emergencia.idEmergencias')->join('jefedefamilia','entregadonaciones.IdJefe','=','jefedefamilia.IdJefe')->join('users','IdVoluntario','=','users.id')->where('emergencia.Estado','Activa')->select('entregadonaciones.IdEntrega','entregadonaciones.created_at','entregadonaciones.IdRetiroPaquetes','entregadonaciones.Cantidad','entregadonaciones.Foto','users.Cedula as Ced','users.name','jefedefamilia.Cedula','jefedefamilia.Nombre','jefedefamilia.Apellido1','emergencia.idEmergencias','emergencia.NombreEmergencias')->get();
      
        $today = Carbon::now()->format('d/m/Y h:i:s A'); 
        $view = view ('EntregaDonaciones.reporteF', compact('EntregaDonaciones', 'today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('EntregaDonaciones'.'.pdf');

    }
}
