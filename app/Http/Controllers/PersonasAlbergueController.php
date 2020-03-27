<?php

namespace App\Http\Controllers;

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
        $persona = new PersonasAlbergue();
        $persona->idAlbergue = $request->idAlbergue;
        $persona->idJefe = $request->idJefe;
        $persona->idEmergencias = $request->idEmergencias;
        $persona->LugarDeProcedencia = $request->LugarDeProcedencia;
        $persona->FechaDeIngreso = $request->FechaDeIngreso;
        $persona->HoraDeIngreso = $request->HoraDeIngreso;
        $persona->FechaDeSalida = $request->FechaDeSalida;
        $persona->HoraDeSalida = $request->HoraDeSalida;
        $persona->save();
        return redirect('PersonasAlbergue')->with('exito','Se ha agregado correctamente');
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
           $Emergencia = Emergencia::orderby('idEmergencias','asc')->select('idEmergencias','NombreEmergencias')->limit(5)->get();
        }else{
           $Emergencia = Emergencia::orderby('idEmergencias','asc')->select('idEmergencias','NombreEmergencias')->where('idEmergencias', 'like', '%' .$search . '%')->limit(5)->get();
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
           $Jefes = JefeDeFamilia::orderby('Cedula','asc')->select('IdJefe','Cedula','Nombre','Apellido1','Apellido2')->where('Cedula', 'like', '%' .$search . '%')->limit(5)->get();
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
    public function update(ValidacionPersonasAlbergue $request, $id)
    {
        $persona = PersonasAlbergue::find($id);
        $persona->fill($request->all());
        $persona->save();
        return redirect('PersonasAlbergue')->with('exito','Se ha actualizado correctamente');
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
      return redirect('PersonasAlbergue')->with('exito','Se ha eliminado correctamente');
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


   }
