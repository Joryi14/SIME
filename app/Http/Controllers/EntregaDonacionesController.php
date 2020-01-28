<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionEntregaDonaciones;
use Illuminate\Support\Facades\DB;
use App\Models\EntregaDonaciones;
use App\Models\EntregaDonacionesAlbergue;
use App\Models\JefeDeFamilia;
use App\Models\Retiro_PaquetesV;
use Illuminate\Http\Request;


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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('EntregaDonaciones.create');
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
        if(EntregaDonacionesAlbergue::where('IdJefeFa',$request->IdJefe)->first()){
            return redirect('EntregaDonaciones')->with('mensaje','Este jefe ya tiene una entrega en el albergue');
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
          $entregadonaciones->created_at = $entregadonaciones->created_at;
          $entregadonaciones->save(); 
          return redirect('EntregaDonaciones')->with('exito','Se ha guardado correctamente'); 
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
     public function getPaquete(Request $request){

        $search = $request->search;
        if($search == ''){
           $Retiro = Retiro_PaquetesV::orderby('IdRetiroPaquetes','asc')->select('IdRetiroPaquetes')->limit(5)->get();
        }else{
           $Retiro = Retiro_PaquetesV::orderby('IdRetiroPaquetes','asc')->select('IdRetiroPaquetes')->where('IdRetiroPaquetes', 'like', '%' .$search . '%')->limit(5)->get();
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
        if($request->hasFile('Foto')){
            $file =$request->file('Foto');
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/Foto/', $name);
            $entregadonaciones->Foto = $name;
          } 
        $entregadonaciones->save();
        return redirect('EntregaDonaciones')->with('mensaje','Se ha actualizado correctamente');
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
        return redirect('EntregaDonaciones')->with('mensaje','Se ha eliminado correctamente');
    }
}
