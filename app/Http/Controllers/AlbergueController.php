<?php

namespace App\Http\Controllers;
use App\Http\Requests\ValidacionesAlbergue;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Albergue;
use App\Models\Emergencia;
use App\Models\EntregaDonacionesAlbergue;
use App\Models\PersonasAlbergue;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
           $Users = User::orderby('Cedula','asc')->select('id','Cedula','name','Apellido1','Apellido2')->limit(5)->get();
        }else{
           $Users = User::orderby('Cedula','asc')->select('id','Cedula','name','Apellido1','Apellido2')->where('Cedula', 'like', '%' .$search . '%')->orWhere('name', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($Users as $user){
           $response[] = array(
                "id"=>$user->id,
                "Cedula"=>$user->Cedula,
                "name"=>$user->name,
                "Apellido1"=>$user->Apellido1,
                "Apellido2"=>$user->Apellido2
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
        $albergue = new Albergue();
        $albergue->fill($request->all());
        $albergue->save();
        return redirect('Albergue')->with('exito','Se ha agregado correctamente');
    }

    public function getAL(){
        $AL = Albergue::orderby('idAlbergue','asc')->select('Nombre','Latitud','Longitud','PersonasAlbergue','Capacidad','telefono','Estado')->get();
        $response = array();
        foreach($AL as $alber){
           $response[] = array(
                "Nombre"=>$alber->Nombre,
                "PersonasAlbergue"=>$alber->PersonasAlbergue,
                "Latitud"=>$alber->Latitud,
                "Longitud"=>$alber->Longitud,
                "Capacidad"=>$alber->Capacidad,
                "telefono"=>$alber->telefono,
                "Estado"=>$alber->Estado
           );
        }
        echo json_encode($response);
        exit;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function PersonasAlbergue($id)
    {   
        $suma = 0;
        $alber = DB::table('registropersonaalbergue')->join('jefedefamilia','jefedefamilia.IdJefe','=','registropersonaalbergue.idJefe')
        ->join('albergue','albergue.idAlbergue','=','registropersonaalbergue.idAlbergue')
        ->join('emergencia','emergencia.idEmergencias','=','registropersonaalbergue.idEmergencias')
        ->select('registropersonaalbergue.idregistroA', 'jefedefamilia.IdJefe', 'jefedefamilia.TotalPersonas','emergencia.Estado', 'albergue.idAlbergue')
        ->where('emergencia.Estado','=','Activa')->where('albergue.idAlbergue',$id)->get();
        foreach($alber as $item){
            $suma = $suma + $item->TotalPersonas;
        }
        $al = Albergue::find($id);
        $al->PersonasAlbergue = $suma;
        $al->save();
        return redirect('Albergue')->with('nota2','Total de personas se ha actualizado correctamente');
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
        return redirect('Albergue')->with('exito','Se ha actualizado correctamente');
    }
    public function Estado($id){
        $alber = Albergue::find($id);
        if($alber->Estado =='Activa')
        {
        $alber->Estado ='Inactiva';
        $alber->save();
        return redirect('Albergue')->with('nota',' Estado inactivo');
        }
        else if($alber->Estado == 'Inactiva'){
        $alber->Estado = 'Activa';
        $alber->save();
        return redirect('Albergue')->with('nota2','Estado activo');
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
        if(PersonasAlbergue::where('idAlbergue',$id)->first()){
            return redirect('Albergue')->with('mensaje','Este Albergue tiene personas asociadas');
        }
        if(EntregaDonacionesAlbergue::where('idAlbergue',$id)->first()){
            return redirect('Albergue')->with('mensaje','Este Albergue tiene entregas asociadas');
        }
        else{
        if(Albergue::destroy($id))
        return redirect('Albergue')->with('exito','Se ha eliminado correctamente');
        }
    }
}
