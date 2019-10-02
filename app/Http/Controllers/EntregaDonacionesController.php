<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionEntregaDonaciones;
use Illuminate\Support\Facades\DB;
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
        $entregadonaciones = EntregaDonaciones::orderBy('IdEntrega')->get();
        return view('EntregaDonaciones.index', compact('entregadonaciones'));
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
    public function store(ValidacionEntregaDonaciones $request)
    {
        if($request->hasFile('Imagenes')){
            $file = $request->file('Imagenes');
            $ConIMA= file_get_contents($file);
          }

          $Foto = base64_encode($ConIMA); 

        $entregadonaciones = DB::select("call Insert_EntregaDonaciones(
        '$request->IdUsuarioRol',
        '$request->IdJefe',
        '$request->IdRetiroPaquetes',
        '$Foto')");  
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
    public function update(ValidacionEntregaDonaciones $request, $id)
    {
        $entregadonaciones = DB::update("call Update_EntregaDonaciones('$id',
        '$request->IdUsuarioRol',
        '$request->IdJefe',
        '$request->IdRetiroPaquetes',
        '$request->Foto')");
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
        $entregadonaciones = EntregaDonaciones::find($id);
        $entregadonaciones->delete();
        return redirect('EntregaDonaciones')->with('Se ha eliminado correctamente');
    }
}
