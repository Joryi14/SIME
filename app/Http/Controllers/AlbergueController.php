<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidacionesAlbergue;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Albergue;
use Illuminate\Http\Request;

class AlbergueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albergue = Albergue::orderBy('idAlbergue')->get();
        return view('Albergue.index', compact('albergue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users =User::pluck('Cedula','id');
        return view('Albergue.create',['users'=>$users]);
      
    }
    public function getUsers(Request $request){

        $search = $request->search;
  
        if($search == ''){
           $Users = User::orderby('Cedula','asc')->select('id','Cedula')->limit(5)->get();
        }else{
           $Users = User::orderby('Cedula','asc')->select('id','Cedula')->where('Cedula', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($Users as $user){
           $response[] = array(
                "id"=>$user->id,
                "text"=>$user->Cedula
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
    public function store(ValidacionesAlbergue $request)
    {

        $albergue = DB::select("call Insert_Albergue('$request->Nombre',
        '$request->Distrito','$request->Comunidad','$request->TipoDeInstalacion','$request->Capacidad', 
        '$request->model_id','$request->telefono','$request->Duchas','$request->inodoros',
        '$request->EspacioDeCocina','$request->Bodega',
        '$request->Longitud','$request->Latitud','$request->Nececidades')");
    // no sirve todavia revisar lo del model_id para guardar
        header("location: /Albergue");
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
        $albergue = Albergue::find($id);
        return view('Albergue.edit', compact('albergue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionesAlbergue $request, $id)
    {
        $albergue = Albergue::find($id);
        $albergue->fill($request->all());
        $albergue->save();
        header("location: /Albergue");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        $albergue = Albergue::find($id);
        $albergue->delete();
        return redirect('Albergue')->with('Se ha eliminado correctamente');
    }
}
