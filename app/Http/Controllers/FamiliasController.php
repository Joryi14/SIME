<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Familias;
use App\Models\JefeDeFamilia;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacionFamilia;

class FamiliasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Familias = Familias::orderBy('IdFamilia')->get();
        return view('Familias.index', compact('Familias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('Familias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionFamilia $request)
    { 
        $jefe = JefeDeFamilia::find($request->IdJefeF);
        if($jefe){
         $Patologia = implode(', ',$request->Patologia);
         $fam = new Familias();
         $fam->fill($request->all());
         $fam->Patologia = $Patologia;
         $fam->save();
         $jefe->TotalPersonas+= 1;
         $jefe->save();
         return redirect('Familias')->with('exito','Se ha agregado correctamente');
        }
        else
        return redirect('Familias/create')->with('mensaje','Error El jefe de familia no existe');
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
        $Familia = Familias::find($id);
        return view('Familias.edit', compact('Familia'));
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
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionFamilia $request, $id)
    {
        $Patologia = implode(', ',$request->Patologia);
        $fam = Familias::find($id);
        $fam->fill($request->all());
        $fam->Patologia = $Patologia;
        $fam->save();      
        return redirect('Familias')->with('exito','Se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
       
        $familia = Familias::find($id);
        $jefe = JefeDeFamilia::find($familia->IdJefeF);
        $jefe->TotalPersonas = $jefe->TotalPersonas - 1;
        $jefe->save();
        $familia->delete();
        return redirect('Familias')->with('exito','Se ha eliminado correctamente');
    
    }
}
