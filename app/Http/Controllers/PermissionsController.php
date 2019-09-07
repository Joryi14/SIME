<?php

namespace App\Http\Controllers;

use App\Models\permissions;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    public function create()
    {
        return view('Login.create-permiso');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permissions = new permissions();
        $permissions->name = $request->name;
        $permissions->guard_name = $request->guard_name;
        $permissions->save();
        header("location: /user");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\permissions  $permissions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        if ($request->ajax()) {
            if (permissions::destroy($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
