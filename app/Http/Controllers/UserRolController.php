<?php

namespace App\Http\Controllers;

use App\Models\UserRol;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users =User::pluck('Cedula','id');
        $roles =Role::pluck('name','id');
        return view('Login.create-UserRol',['users'=>$users],['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::find($request->model_id);
        $role = Role::findById($request->role_id);
        $user->assignRole($role->name);
        return redirect('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRol  $userRol
     * @return \Illuminate\Http\Response
     */
    public function show(UserRol $userRol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRol  $userRol
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRol $userRol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRol  $userRol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRol $userRol)
    {
        //
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
     public function getRoles(Request $request){

        $search = $request->search;
  
        if($search == ''){
           $Roles = Role::orderby('name','asc')->select('id','name')->limit(5)->get();
        }else{
           $Roles = Role::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }
  
        $response = array();
        foreach($Roles as $role){
           $response[] = array(
                "id"=>$role->id,
                "text"=>$role->name
           );
        }
  
        echo json_encode($response);
        exit;
     }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRol  $userRol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserRol::where('role_id', $id)->delete();
        return redirect('user')->with('Se ha eliminado correctamente');
    }
}
