<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidacionEntregaDonacionesAlbergue;
use App\Models\Albergue;
use App\Models\Emergencia;
use Illuminate\Support\Facades\DB;
use App\Models\JefeDeFamilia;
use App\Models\EntregaDonacionesAlbergue;
use Illuminate\Http\Request;

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
               if(Albergue::find($request->idEmergencias)){
        $entr = new EntregaDonacionesAlbergue();
        $entr->fill($request->all());
        $entr->save();
        return redirect('EntregaDonacionesAlbergue')->with('mensaje','Se ha guardado');
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
           $Emergencia = Emergencia::orderby('idEmergencias','asc')->select('idEmergencias')->limit(5)->get();
        }else{
           $Emergencia = Emergencia::orderby('idEmergencias','asc')->select('idEmergencias')->where('idEmergencias', 'like', '%' .$search . '%')->limit(5)->get();
        }
        $response = array();
        foreach($Emergencia as $Emer){
           $response[] = array(
                "id"=>$Emer->idEmergencias,
                "text"=>$Emer->idEmergencias
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
           $Jefes = JefeDeFamilia::orderby('Cedula','asc')->select('IdJefe','Cedula')->limit(5)->get();
        }else{
           $Jefes = JefeDeFamilia::orderby('Cedula','asc')->select('IdJefe','Cedula')->where('Cedula', 'like', '%' .$search . '%')->limit(5)->get();
        }
        $response = array();
        foreach($Jefes as $jefe){
           $response[] = array(
                "id"=>$jefe->IdJefe,
                "text"=>$jefe->Cedula
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
        return redirect('EntregaDonacionesAlbergue')->with('mensaje','Editado correctamente');
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
        return redirect('EntregaDonacionesAlbergue')->with('Se ha eliminado correctamente');
    }
}
