<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacionAccion;
use App\Http\Requests\ValidacionMensajeria;
use App\Models\Acciones;
use App\Models\Emergencia;
use App\Models\Mensajeria;
use Illuminate\Http\Request;

class MensajeriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mensajerias = Mensajeria::orderBy('IdMensajeria','desc')->limit(10)->get();
        return view('Mensajeria.index', compact('mensajerias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Mensajeria.create');
    }
    public function ubicacion($Longitud,$Latitud){
        return view('Mensajeria.ubicacion', compact('Longitud','Latitud'));
    }
    public function search(Request $request){
     
        $mensajerias = $request->get('buscar');
        $mensajerias = Mensajeria::orderBy('IdMensajeria','desc')->where('CodigoIncidente','like','%'.$mensajerias.'%')->orwhere('IdMensajeria','like','%'.$mensajerias.'%')->limit(5)->get();
        return view('Mensajeria.index', compact('mensajerias'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidacionMensajeria $request)
    {
        if(Mensajeria::where('CodigoIncidente',$request->CodigoIncidente)->first()){
          return redirect('Mensajeria\create')->with('mensaje','Error codigo en uso');
        }
        $mensajeria = new Mensajeria();
        $mensajeria->fill($request->all());
        $mensajeria->save();
        return redirect('Mensajeria')->with('exito','Se ha agregado correctamente');
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
        $mensajeria = Mensajeria::find($id);
        return view('Mensajeria.edit', compact('mensajeria'));
      
    }

    public function accion($id)
    {
        $mensajeria = Mensajeria::find($id);
        return view('Mensajeria.accion', compact('mensajeria'));
    }
    public function storeA(ValidacionAccion $request)
    {
          $acciones = new Acciones();
          $acciones->fill($request->all());
          $acciones->save();
          return redirect('Mensajeria')->with('exito','Se ha agregado correctamente');
    }
    public function deleteA($id)
    {
          $acciones = Acciones::find($id);
          $acciones->delete();
          return redirect('Mensajeria')->with('mensaje','Se ha eliminado correctamente');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ValidacionMensajeria $request, $id)
    {
        $mensajeria = Mensajeria::find($id);
        $mensajeria->fill($request->all());
        $mensajeria->save();
        return redirect('Mensajeria')->with('mensaje','Editado correctamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {   
        $user = Mensajeria::find($id);
        $user->delete();
        return redirect('Mensajeria')->with('mensaje','Se ha eliminado correctamente');
    
    }
}
