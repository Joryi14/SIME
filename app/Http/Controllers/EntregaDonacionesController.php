<?php

namespace App\Http\Controllers;

use App\Models\EntregaDonaciones;
use Illuminate\Http\Request;

class EntregaDonacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entregadonacioness = EntregaDonaciones::orderBy('IdEntrega')->get();
        return view('EntregaDonaciones.index', compact('entregadonacioness'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('EntregaDonaciones.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entregadonaciones = new EntregaDonaciones();
        $entregadonaciones->IdUsuarioRol = $request->IdUsuarioRol;
        $entregadonaciones->IdJefe = $request->IdJefe;
        $entregadonaciones->IdRetiroPaquetes = $request->IdRetiroPaquetes;
        $entregadonaciones->Foto = $request->Foto;
        $entregadonaciones->save();  
        header("location:EntregaDonaciones /");
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
        $entregadonaciones = EntregaDonaciones::find($id);
        return view('EntregaDonaciones.edit', compact('entregadonaciones'));
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
        $entregadonaciones = EntregaDonaciones::find($id);
        $entregadonaciones->fill($request->all());
        $entregadonaciones->save();
        header("location: /EntregaDonaciones");
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, Request $request)
    {
        if ($request->ajax()) {
            if (EntregaDonaciones::delete($id)) {
                return response()->json(['mensaje' => 'ok']);
            } else {
                return response()->json(['mensaje' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
