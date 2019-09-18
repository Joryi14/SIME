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
        $users =User::pluck('id','Cedula');
        $roles =Role::pluck('id','name')->prepend("Selecciona2");
        return view('Login.create-UserRol',['users'=>$users]);
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
        header("location: /user");
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
