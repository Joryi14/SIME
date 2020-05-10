<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Censo;
use Illuminate\Http\Request;
use App\Http\Requests\ValidacionCenso;
use App\Models\JefeDeFamilia;

class CensoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $censos = Censo::orderBy('IdCenso')->get();
        $cen = NULL;
        return view('Censo.index', compact('censos','cen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Censo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionCenso $request)
    {
        if(JefeDeFamilia::find($request->IdJefeFam)!= NULL){
            $censo = new Censo();
            $censo->fill($request->all());
            $censo->save();
        return redirect('Censo')->with('exito','Se ha agregado correctamente');
        }
        else
        return redirect('Censo\create')->with('mensaje','Error el jefe de familia no existe');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $cen = Censo::find($id);
      return response()->json(array($cen)); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $censo = Censo::find($id);
        return view('Censo.edit', compact('censo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $censo = DB::update("call Update_Censo('$id','$request->IdJefeFam'
        ,'$request->Refrigerador','$request->Cocina','$request->Colchon','$request->Cama')");  
    
        return redirect('Censo')->with('exito','Se ha actualizado correctamente'); 

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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $censo = Censo::find($id);
        $censo->delete();
        return redirect('Censo')->with('exito','Se ha eliminado correctamente');
        
    }
}
