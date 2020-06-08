<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionEditarPersonaA;
use App\Http\Requests\ValidacionPersonasAlbergue;
use App\Models\Albergue;
use App\Models\Emergencia;
use App\Models\JefeDeFamilia;
use App\Models\PersonasAlbergue;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PersonasAlbergueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persona = PersonasAlbergue::orderBy('idregistroA')->get();
        return view('PersonasAlbergue.index', compact('persona'));
    }

    public function index2()
    {
       $persona = new PersonasAlbergue();
      $persona = DB::table('registropersonaalbergue')->join('emergencia','registropersonaalbergue.idEmergencias','=','emergencia.idEmergencias')->join('jefedefamilia','registropersonaalbergue.idJefe','=','jefedefamilia.IdJefe')->join('albergue','registropersonaalbergue.idAlbergue','=','albergue.idAlbergue')->where('emergencia.Estado','Activa')->select('registropersonaalbergue.idregistroA',
      'albergue.idAlbergue','albergue.Nombre as n','jefedefamilia.IdJefe','jefedefamilia.Cedula',
      'emergencia.idEmergencias','registropersonaalbergue.LugarDeProcedencia',
      'jefedefamilia.Nombre','jefedefamilia.Apellido1','registropersonaalbergue.FechaDeIngreso'
      ,'emergencia.NombreEmergencias','registropersonaalbergue.HoraDeIngreso','registropersonaalbergue.FechaDeSalida'
      ,'registropersonaalbergue.HoraDeSalida','registropersonaalbergue.created_at')->get();

        return view('PersonasAlbergue.indexFiltrado', compact('persona'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('PersonasAlbergue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionPersonasAlbergue $request)
    {    
        if(JefeDeFamilia::find($request->idJefe)){
        if(Albergue::find($request->idAlbergue)){
         if(Emergencia::find($request->idEmergencias)){
            if(PersonasAlbergue::where('idJefe',$request->idJefe)->where('idEmergencias',$request->idEmergencias)->first())
            {
               return redirect('PersonasAlbergue/create')->with('mensaje','Error persona ya esta en albergue');
            }
        if(DB::table('registropersonaalbergue')->join('emergencia','registropersonaalbergue.idEmergencias','=','emergencia.idEmergencias')->where('idJefe',$request->idJefe)->where('emergencia.Estado','Activa')->first()){
         return redirect('PersonasAlbergue/create')->with('mensaje','Error la persona ya esta en un albergue por una emergencia activa');
        }    
        $persona = new PersonasAlbergue();
        $persona->HoraDeSalida = Carbon::now();
        $persona->FechaDeSalida = Carbon::now();
        $persona->fill($request->all());
        $persona->save();
        return redirect('PersonasAlbergue/Filtrado')->with('exito','Se ha agregado correctamente');
    
   }
       else
       return redirect('PersonasAlbergue/create')->with('mensaje','Error Emergencia no existe');
    }
        else
        return redirect('PersonasAlbergue/create')->with('mensaje','Error el albergue no existe');
        }
        else
        return redirect('PersonasAlbergue/create')->with('mensaje','Error El jefe de familia no existe');
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
        $persona = PersonasAlbergue::find($id);
        return view('PersonasAlbergue.edit', compact('persona'));
    }




    public function getIdJF(Request $request){

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
    public function update(ValidacionEditarPersonaA $request, $id)
    {
        $persona = PersonasAlbergue::find($id);
        $persona->fill($request->all());
        $persona->save();
        return redirect('PersonasAlbergue/Filtrado')->with('exito','Se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
      $persona = PersonasAlbergue::find($id);
      $persona->delete();
      return redirect('PersonasAlbergue/Filtrado')->with('exito','Se ha eliminado correctamente');
    }

    public function generar()
    {
        $persona = PersonasAlbergue::orderBy('idregistroA')->get();
        $today = Carbon::now()->format('d/m/Y h:i:s A'); 
        $view = view ('PersonasAlbergue.reporte', compact('persona', 'today'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('persona'.'.pdf');

    }

    public function ReporteFecha(request $request){
        
      $persona = PersonasAlbergue::orderby('idregistroA')->whereBetween('created_at', array($request->Fecha1,$request->Fecha2)) 
      ->get();
      $today = Carbon::now()->format('d/m/Y h:i:s A');
      $view = view ('PersonasAlbergue.reporte', compact('persona', 'today'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('persona'.'.pdf');
  }


  public function generarF()
  {
   $persona = new PersonasAlbergue();
   $persona = DB::table('registropersonaalbergue')->join('emergencia','registropersonaalbergue.idEmergencias','=','emergencia.idEmergencias')->join('jefedefamilia','registropersonaalbergue.idJefe','=','jefedefamilia.IdJefe')->join('albergue','registropersonaalbergue.idAlbergue','=','albergue.idAlbergue')->where('emergencia.Estado','Activa')->select('registropersonaalbergue.idregistroA',
   'albergue.idAlbergue','albergue.Nombre as n','jefedefamilia.IdJefe','jefedefamilia.Cedula',
   'emergencia.idEmergencias','registropersonaalbergue.LugarDeProcedencia',
   'jefedefamilia.Nombre','jefedefamilia.Apellido1','registropersonaalbergue.FechaDeIngreso'
   ,'emergencia.NombreEmergencias','registropersonaalbergue.HoraDeIngreso','registropersonaalbergue.FechaDeSalida'
   ,'registropersonaalbergue.HoraDeSalida','registropersonaalbergue.created_at')->get();
      $today = Carbon::now()->format('d/m/Y h:i:s A'); 
      $view = view ('PersonasAlbergue.reporteF', compact('persona', 'today'))->render();
      $pdf = \App::make('dompdf.wrapper');
      $pdf->loadHTML($view);
      return $pdf->stream('persona'.'.pdf');

  }

  public function ReporteFechaF(request $request){
      
   $persona = new PersonasAlbergue();
      $persona = DB::table('registropersonaalbergue')->join('emergencia','registropersonaalbergue.idEmergencias','=','emergencia.idEmergencias')->join('jefedefamilia','registropersonaalbergue.idJefe','=','jefedefamilia.IdJefe')->join('albergue','registropersonaalbergue.idAlbergue','=','albergue.idAlbergue')->where('emergencia.Estado','Activa')->select('registropersonaalbergue.idregistroA',
      'albergue.idAlbergue','albergue.Nombre as n','jefedefamilia.IdJefe','jefedefamilia.Cedula',
      'emergencia.idEmergencias','registropersonaalbergue.LugarDeProcedencia',
      'jefedefamilia.Nombre','jefedefamilia.Apellido1','registropersonaalbergue.FechaDeIngreso'
      ,'emergencia.NombreEmergencias','registropersonaalbergue.HoraDeIngreso','registropersonaalbergue.FechaDeSalida'
      ,'registropersonaalbergue.HoraDeSalida','registropersonaalbergue.created_at')->get();
    $today = Carbon::now()->format('d/m/Y h:i:s A');
    $view = view ('PersonasAlbergue.reporteF', compact('persona', 'today'))->render();
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->stream('persona'.'.pdf');
}
   }
