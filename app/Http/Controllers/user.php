<?php

namespace App\Http\Controllers;

use App\Models\permissions;
use App\Models\roles;
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
        $rols = roles::OrderBy('id')->get();
        $permissions = permissions::OrderBy('id')->get();
        return view('Login.users',compact('users','rols','permissions'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $user = AppUser::find($id);
     return view('Login.show',compact('user'));
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
    public function destroy($id,Request $request)
    {
        if ($request->ajax()) {
            if (AppUser::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
