<?php

namespace App\Http\Controllers;
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
        $mensajerias = Mensajeria::orderBy('IdMensajeria')->get();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mensajeria = new Mensajeria();
        $mensajeria->CodigoIncidente = $request->CodigoIncidente;
        $mensajeria->Descripcion = $request->Descripcion;
        $mensajeria->Ubicacion = $request->Ubicacion;
        $mensajeria->Hora = $request->Hora;
        $mensajeria->fecha = $request->Fecha;
        $mensajeria->Categoria = $request->Categoria;
        $mensajeria->IdLiderComunal = $request->IdLiderComunal;
        $mensajeria->save();
        return redirect('Mensajeria')->with('mensaje','Se ha guardado');
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        return redirect('Mensajeria')->with('Se ha eliminado correctamente');
    
    }
}
