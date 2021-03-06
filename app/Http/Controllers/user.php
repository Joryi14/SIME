<?php

namespace App\Http\Controllers;

use App\Models\Albergue;
use App\Models\Pais;
use App\Models\permisoRol;
use App\Models\permissions;
use App\Models\roles;
use App\Models\UserRol;
use App\User as AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class user extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = AppUser::OrderBy('id')->get();
        return view('Login.users',compact('users'));
    }
    public function indexR()
    {
        $rols = roles::OrderBy('id')->get();
        return view('Login.usersRol',compact('rols'));
    }
    public function indexUR()
    {
        $UserRol = UserRol::get();
        return view('Login.usersUR',compact('UserRol'));
    }
    public function Estado($id){
        $user = AppUser::find($id);
        if($user->Estado =='1')
        {
        $user->Estado ='0';
        $user->save();
        return redirect('/user')->with('nota',' Estado inactivo');
        }
        else if($user->Estado == '0'){
        $user->Estado = '1';
        $user->save();
        return redirect('/user')->with('nota2','Estado activo');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
     return view('Login.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $user = AppUser::find($id);
     return view('Login.show',compact('user'));
    }
    public function getNacionalidad(Request $request){

        $search = $request->search;
        if($search == ''){
           $Pais = Pais::orderby('id','asc')->select('id','nombre')->limit(10)->get();
        }else{
           $Pais = Pais::orderby('id','asc')->select('id','nombre')->where('nombre', 'like', '%' .$search.'%')->limit(5)->get();
        }
        $response = array();
        foreach($Pais as $pai){
           $response[] = array(
                "id"=>$pai->nombre,
                "text"=>$pai->nombre
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
    public function update(Request $request, $id)
    {
        $patologia = implode(', ',$request->patologia);
        
        $user = DB::update("call Update_Users('$id','$request->name','$request->Apellido1','$request->Apellido2',
        '$request->Cedula','$patologia','$request->Nacionalidad','$request->Comunidad')");
        return view('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        
        if(UserRol::find($id)){
            return redirect('user')->with('mensaje','Error al eliminar el usuario tiene un rol asignado');
        }
        if(Albergue::where('model_id',$id)->first()){
            return redirect('user')->with('mensaje','Error al eliminar el usuario es responsable de un Albergue');
        }
        else{
        if(AppUser::destroy($id))
        return redirect('user')->with('exito','Se ha eliminado correctamente');
        else 
        return redirect('user')->with('exito','Error al Eliminar');
}
}
}
