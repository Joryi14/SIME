<?php

namespace App\Http\Controllers;

use App\Models\permisoRol;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermisoRolController extends Controller
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
        return view('Login.create-permisoRol');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::findById($request->role_id);
        $permission = Permission::findById($request->permission_id);
        $role->givePermissionTo($permission);
        header("location: /user");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\permisoRol  $permisoRol
     * @return \Illuminate\Http\Response
     */
    public function show(permisoRol $permisoRol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\permisoRol  $permisoRol
     * @return \Illuminate\Http\Response
     */
    public function edit(permisoRol $permisoRol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\permisoRol  $permisoRol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, permisoRol $permisoRol)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\permisoRol  $permisoRol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        permisoRol::where('permission_id', $id)->delete();
        return redirect('user')->with('Se ha eliminado correctamente');
    }
}
